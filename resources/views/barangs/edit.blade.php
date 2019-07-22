@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        
          <h3>Edit Data Barang</h3>
        </div>
      </div>
    </div>

    @if(count($errors) > 0)
        <div class="col-md-11">
          <div class="form-group">
            <div class="alert alert-danger" style="margin-left:8%;">
              <strong>Whooops!!! </strong>Terjadi kesalahan dalam inputan anda. <br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
    @endif

    {!! Form::model($barang, ['method'=>'PATCH','route'=>['barangs.update', $barang->id]])!!}
      @include('barangs.form')
    {!! Form::close() !!}
  </div>
@endsection
