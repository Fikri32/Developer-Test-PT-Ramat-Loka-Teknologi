@extends('layouts/master')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Edit Penerbit</h2>
        <ul class="nav navbar-right panel_toolbox">
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form method="POST" enctype="multipart/form-data" action="{{route('penerbit.update',$penerbit->id)}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          @csrf
          @method('PUT')
          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Nama penerbit <span class="required">*</span>
            </label>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="nama" id="nama" value="{{$penerbit->nama}}" value="" class="form-control col-md-7 col-xs-12">

              @if ($errors->has('nama'))
              <span class="text-danger">{{ $errors->first('nama') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Alamat <span class="required">*</span>
            </label>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="alamat" id="alamat" value="{{($penerbit->alamat)}}" value="" class="form-control col-md-7 col-xs-12">

              @if ($errors->has('alamat'))
              <span class="text-danger">{{ $errors->first('alamat') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Handphone <span class="required">*</span>
            </label>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="no_hp" id="" value="{{($penerbit->no_hp)}}"class="form-control col-md-7 col-xs-12">

              @if ($errors->has('no_hp'))
              <span class="text-danger">{{ $errors->first('no_hp') }}</span>
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