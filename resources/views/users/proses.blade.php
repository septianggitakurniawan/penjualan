@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
	       <div class="col-sm-12">
		         <div class="full-right">
			            <h2>Riwayat Pembelian <a class="btn btn-sm btn-danger" style="margin-left:10px;" href="{{route('users.index')}}">HOME</a></h2>
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
          <th style="width:50px;">No.</th>
          <th>Nama</th>
          <th>Tanggal</th>

          <th width="210px">Actions</th>
        </tr>

                <?php $i=0 ?>
                @foreach ($transaksi as $data)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{ route('users.detail', $data->id) }}">Detail</a></td>
                  </tr>

                </div>
                @endforeach
      </table>

@endsection
