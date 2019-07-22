@extends('layouts.app')

@section('content')
  {!! Form::open(['method' => 'POST', 'route'=>['users.proses'], 'style'=> 'display:inline']) !!}

  <div class="container">
      <div class="row">
	       <div class="col-sm-12">
		         <div class="full-right">
               @foreach ($barangs as $barang)
                 <input style="margin-left:5px;" type="hidden" name="val[]" value="{{$barang->id}}"/>


               @endforeach
			            <h2>List Pesananan Anda <button class="btn btn-sm btn-danger" style="margin-left:20px;" type="submit">Kirim Pesanan</button></h2>
             </div>
	       </div>
      </div>

      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
      @endif

      <div class="col-md-12">
        <div class="form-group">
          <p>Nama : </p>
          {!!Form::text('nama',Auth::user()->name,['placeholder'=>'Masukan Nama','class'=>'form-control','readonly'])!!}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <p>Alamat : </p>
          {!!Form::text('alamat',null,['placeholder'=>'Masukan Alamat','class'=>'form-control'])!!}
        </div>
      </div>


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
          <th>Harga Barang Per PCS</th>
          <th>Kategory</th>

        </tr>
        <?php $i=0 ?>
        @foreach ($barangs as $barang)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $barang->kodeBarang }}</td>
            <td>{{ $barang->namaBarang }}</td>
            <td width="130px;">{!!Form::text('jumlah[]',null,['placeholder'=>'Berapa pcs','class'=>'form-control'])!!}</td>
            <td>{{ $barang->hargaJual }}</td>
            <td>{{ $barang->kategory }}</td>

          </tr>

        </div>
        @endforeach

</div>
      </table>
{!! Form::close() !!}
@endsection
