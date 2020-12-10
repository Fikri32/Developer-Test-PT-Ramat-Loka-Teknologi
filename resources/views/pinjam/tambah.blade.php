@extends('layouts/master')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah Transaksi Peminjaman</h2>
        <ul class="nav navbar-right panel_toolbox">
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form method="POST" action="{{route('pinjam.tambah')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Peminjam <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="nama" id="" value="" class="form-control col-md-7 col-xs-12">
              @if ($errors->has('nama'))
              <span class="text-danger">{{ $errors->first('nama') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Tanggal Pinjam <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date" name="pinjam" id="" value="" class="form-control col-md-7 col-xs-12">
              @if ($errors->has('pinjam'))
              <span class="text-danger">{{ $errors->first('pinjam') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Tanggal Kembali <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date" name="kembali" id="" value="" class="form-control col-md-7 col-xs-12">
              @if ($errors->has('kembali'))
              <span class="text-danger">{{ $errors->first('kembali') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Buku <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select  class="form-control col-md-7 col-xs-12" name="buku" id="">
                  <option value="">== Pilih Buku ==</option>
                  @foreach ($buku as $d)
                  <option value="{{$d->id}}">{{$d->judul}}</option>
                  @endforeach
              </select>
              @if ($errors->has('kategori'))
              <span class="text-danger">{{ $errors->first('kategori') }}</span>
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