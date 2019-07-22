<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\transaksi;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
      // $barangs=barang::latest()->paginate(10);
      // return view('users.index',compact('barangs'))->with('i',(request()->input('page',1)-1)*10);

      // return Datatables::of(barang::all())->make(true);
      // return view('barangs');

      // $barangs = barang::select(['id', 'kodeBarang', 'namaBarang', 'stock', 'hargaJual','kategory']);
      // return Datatables::of($barangs)->make(true);

      // return Datatables::of(barang::all())->make(true);
      $barangs= Datatables::of(Barang::query())->make(true);
      return view('users.index')->with('barangs', $barangs);



    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function getData()
    // {
    //   $barangs = barang::select(['id', 'kodeBarang', 'namaBarang', 'stock', 'hargaJual','kategory']);
    //   return Datatables::of($barangs)->make(true);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $barangs = barang::whereIn('id',$request->val)->get();
      return view('users.create',compact('barangs'));

    }

    public function save(Request $request)
    {

      foreach($request->val as $key => $val){
          $b = barang::find($val);
          $t = new transaksi;
          $t->nama = $request->nama;
          $t->alamat = $request->alamat;
          $t->kodeBarang = $b->kodeBarang;
          $t->namaBarang = $b->namaBarang;
          $t->jumlah = $request->jumlah[$key];
          $t->harga_per_pcs = $b->hargaJual;
          $t->kategory = $b->kategory;
          $t->save();
          return redirect ('/riwayat')->with('success','List Belanja Anda Berhasil Kami Terima');
      }
    }

    /**public function search(Request $request)
    {
      $search = $request->get('search');
      $barangs = DB::table('barangs')->where('namaBarang','like','%'.$search.'%')->pagination(10);
      return view('index',['barangs'=>$barangs]);
    }*

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function riwayat()
    {
      // $transaksi = transaksi::groupBy('nama')->groupBy('created_at')->get();
      // return view('users.proses',compact('transaksi'))->with('i',(request()->input('page',1)-1)*7);

        $transaksi = transaksi::where('nama',Auth::user()->name)->groupBy('nama')->groupBy('created_at')->get();
        return view('users.proses',compact('transaksi'))->with('i',(request()->input('page',1)-1)*7);
    }

    public function detail($id)
    {
        $transaksi=transaksi::find($id);
        $filter = transaksi::where('nama',$transaksi->nama)->where('created_at',$transaksi->created_at)->get();

        return view('users.detail',compact('filter'))->with('i',(request()->input('page',1)-1)*7);
    }

    /**
     * Show the form for editing the specified resource.
     * the fuck i still dont know about checklist
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
