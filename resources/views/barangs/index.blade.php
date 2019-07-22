@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
	       <div class="col-sm-12">
		         <div class="full-right">
			            <h2>Data Barang <a class="btn btn-sm btn-success" style="margin-left:20px;" href="{{ route('barangs.create') }}">Tambah Data Barang +</a><a class="btn btn-sm btn-primary" style="margin-left:10px;" href="{{ route('barangs.pembelian') }}">Lihat Transaksi Pembelian</a><a class="btn btn-sm btn-danger" style="margin-left:48.5%;" href="{{route('admin.logout')}}">Log Out</a></h2>
             </div>
	       </div>
      </div>

      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
      @endif

      <table class="table table-bordered" name="tables" style="margin-top:15px;">
        <tr>
          <th>No.</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Stock Barang</th>
          <th>Harga Jual</th>
          <th>Kategory</th>

          <th width="140px">Actions</th>
        </tr>

        @foreach ($barangs as $barang)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $barang->kodeBarang }}</td>
            <td>{{ $barang->namaBarang }}</td>
            <td>{{ $barang->stock }}</td>
            <td>{{ $barang->hargaJual }}</td>
            <td>{{ $barang->kategory }}</td>
            <td>
              {{-- <a class="btn btn-sm btn-primary" href="{{ route('barangs.show', $barang->id) }}">Detail</a> --}}
              <a class="btn btn-sm btn-warning" href="{{ route('barangs.edit', $barang->id) }}">Edit</a>

              {!! Form::open(['method' => 'DELETE', 'route'=>['barangs.destroy', $barang->id], 'style'=> 'display:inline']) !!}
              {!! Form::submit('Delete',['class'=> 'btn btn-sm btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        </div>
        @endforeach
      </table>
      {!! $barangs->links() !!}

@endsection
