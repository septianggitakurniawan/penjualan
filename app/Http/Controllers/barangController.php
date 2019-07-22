<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\barang;
use App\transaksi;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs=barang::latest()->paginate(7);
        return view('barangs.index',compact('barangs'))->with('i',(request()->input('page',1)-1)*7);
    }

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function pembelian()
    {
      $transaksi = transaksi::groupBy('nama')->groupBy('created_at')->get();
      return view('barangs.pembelian',compact('transaksi'))->with('i',(request()->input('page',1)-1)*7);
    }

    public function detailAdmin($id)
    {
        $transaksi=transaksi::find($id);
        $filter = transaksi::where('nama',$transaksi->nama)->where('created_at',$transaksi->created_at)->get();

        return view('barangs.detailAdmin',compact('filter'))->with('i',(request()->input('page',1)-1)*7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'kodeBarang' => 'required',
          'namaBarang' => 'required',
          'stock' => 'required',
          'hargaJual' => 'required',
          'kategory' => 'required',
        ]);
        barang::create($request->all());
        return redirect()->route('barangs.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = barang::find($id);
        return view('barangs.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'kodeBarang' => 'required',
        'namaBarang' => 'required',
        'stock' => 'required',
        'hargaJual' => 'required',
        'kategory' => 'required',
      ]);
      barang::find($id)->update($request->all());
      return redirect()->route('barangs.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        barang::find($id)->delete();
        return redirect()->route('barangs.index')->with('success','Barang berhasil dihapus');
    }
}
