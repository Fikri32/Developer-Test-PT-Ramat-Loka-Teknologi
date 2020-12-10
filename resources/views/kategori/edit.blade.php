@extends('layouts/master')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Edit Kategori</h2>
        <ul class="nav navbar-right panel_toolbox">
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form method="POST" enctype="multipart/form-data" action="{{route('kategori.update',$kategori->id)}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          @csrf
          @method('PUT')
          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Kategori Buku <span class="required">*</span>
            </label>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="nama" id="nama" value="{{$kategori->nama}}" value="" class="form-control col-md-7 col-xs-12">

              @if ($errors->has('nama'))
              <span class="text-danger">{{ $errors->first('nama') }}</span>
              @endif
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success">Submit</button>
              <button class="btn btn-primary" type="reset">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection