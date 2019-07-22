@extends('layouts.app')

@section('content')
  {!! Form::open(['method' => 'POST', 'route'=>['users.proses'], 'style'=> 'display:inline']) !!}

  <div class="container">
      <div class="row">
	       <div class="col-sm-12">
		         <div class="full-right">
			            <h2>Detail Belanja <a class="btn btn-sm btn-primary" style="margin-left:0px;" href="#">Cetak Excel</a></h2>
             </div>
	       </div>
      </div>

      {!! Form::close() !!}

      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
      @endif

      <table class="table table-bordered" style="margin-top:15px;">
        <tr>
          <th>No.</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Jumlah Barang</th>
          <th>Harga Barang</th>
          <th>Kategory</th>
          <th>Total</th>

        </tr>
        <?php $total = 0 ?>
        @foreach ($filter as $data)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $data->kodeBarang }}</td>
            <td>{{ $data->namaBarang }}</td>
            <td>{{ $data->jumlah }}</td>
            <td>{{ $data->harga_per_pcs }}</td>
            <td>{{ $data->kategory }}</td>
            <td>{{ $data->jumlah*$data->harga_per_pcs }}</td>
            <?php $total += ($data->jumlah * $data->harga_per_pcs) ?>
          </tr>
        @endforeach
      </table>
      <h4 style="font-family:sans-serif">Total Pembayaran : Rp. {{$total}}</h4>
    </div>


@endsection
