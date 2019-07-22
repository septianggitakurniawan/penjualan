@extends('layouts.app')
@section('content')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
<div class="container">

    {!! Form::open(['method' => 'POST', 'route'=>['barangs.addtransaction'], 'style'=> 'display:inline']) !!}

      <div class="row">
	       <div class="col-sm-12">
		         <div class="full-right">
			            <h2>List Barang Yang Tersedia <button class="btn btn-sm btn-success" type="submit" style="margin-left:20px;">Proses Transaksi</button><a class="btn btn-sm btn-primary" style="margin-left:10px;" href="{{ route('users.riwayat') }}">History Belanja</a><a class="btn btn-sm btn-danger" style="margin-left:40.3%;" href="{{route('users.logout')}}">Log Out</a></h2>
		         </div>
	       </div>
      </div>

      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
      @endif


      <table id="table"  class="table table-bordered" style="margin-top:15px;">
        <thead>
          <tr>
            <th>NO.</th>
            <th>KODE BARANG</th>
            <th>NAMA BARANG</th>
            <th>STOCK BARANG</th>
            <th>HARGA SATUAN (Rp.)</th>
            <th>KATEGORY</th>
            <th width="10px">PILIH</th>
          </tr>


        <?php $i=0 ?>
        @foreach ($barangs as $barang)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $barang->kodeBarang }}</td>
            <td>{{ $barang->namaBarang }}</td>
            <td>{{ $barang->stock }}</td>
            <td>{{ $barang->hargaJual }}</td>
            <td>{{ $barang->kategory }}</td>
            <td>
              <input style="margin-left:5px;" type="checkbox" name="val[]" value="{{$barang->id}}"/>
            </td>
          </tr>

        </div>
        @endforeach
        </thead>
      </table>
      {!! Form::close() !!}
      {{-- {!! $barangs->links() !!} --}}



  @endsection

  @section('scripts')
    <script type="text/javascript">
      $(document).ready( function () {
        $('#table').DataTable({
          processing: true,
          serverSide: true,
        });
      } );
    </script>
    {{-- <script type="text/javascript">
        $(function() {
          $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'users.index',
            columns :[
              {data:'id', name: 'id'},
              {data:'kodeBarang', name: 'kodeBarang'},
              {data:'namaBarang', name: 'namaBarang'},
              {data:'stock', name: 'stock'},
              {data:'hargaJual', name: 'hargaJual'},
              {data:'kategory', name: 'kategory'}
            ]
          });
        });
    </script> --}}
  @endsection
