@extends('layouts/master')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Edit Buku</h2>
        <ul class="nav navbar-right panel_toolbox">
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form method="POST" enctype="multipart/form-data" action="{{route('buku.update',$buku->id)}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          @csrf
          @method('PUT')

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Buku <span class="required">*</span>
            </label>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="judul" id="" value="{{$buku->judul}}" class="form-control col-md-7 col-xs-12">

              @if ($errors->has('judul'))
              <span class="text-danger">{{ $errors->first('judul') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Buku <span class="required">*</span>
            </label>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="jumlah" id="" value="{{$buku->jumlah}}" class="form-control col-md-7 col-xs-12">

              @if ($errors->has('jumlah'))
              <span class="text-danger">{{ $errors->first('jumlah') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Terbit <span class="required">*</span>
            </label>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date" name="tgl" id="" value="{{$buku->tgl_terbit}}" class="form-control col-md-7 col-xs-12">

              @if ($errors->has('tgl'))
              <span class="text-danger">{{ $errors->first('tgl') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori <span class="required">*</span>
            </label>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <select  class="form-control col-md-7 col-xs-12" name="kategori" id="">
                <option value="">==Default== {{$buku->kategori->nama}} </option>
               @foreach ($kategori as $d)
                <option value="{{$d->id}}">{{$d->nama}}</option>
               @endforeach
                </select>
              @if ($errors->has('kategori'))
              <span class="text-danger">{{ $errors->first('kategori') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Penulis <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select  class="form-control col-md-7 col-xs-12" name="penulis" id="">
                <option value="">==Default== {{$buku->penulis->nama}}  </option>
               @foreach ($penulis as $p)
                <option value="{{$p->id}}">{{$p->nama}}</option>
               @endforeach
                </select>
              @if ($errors->has('penulis'))
              <span class="text-danger">{{ $errors->first('penulis') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Penerbit <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select  class="form-control col-md-7 col-xs-12" name="penerbit" id="">
                <option value="">==Default== {{$buku->penerbit->nama}}</option>
               @foreach ($penerbit as $b)
                <option value="{{$b->id}}">{{$b->nama}}</option>
               @endforeach
                </select>
              @if ($errors->has('penerbit'))
              <span class="text-danger">{{ $errors->first('penerbit') }}</span>
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