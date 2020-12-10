@extends('layouts/master')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>List Transaksi Peminjaman</h2>
        <ul class="nav navbar-right panel_toolbox">
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-left">
          <label for="">Cari berdasarkan Tanggal Jatuh Tempo</label>
          <form action="{{route('pinjam.index')}}" method="GET">
            <div class="input-group">
              <input type="date" class="form-control" name="tempo" placeholder="Cari Transaksi">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Cari</button>
              </span>
            </div>
          </form>
        </div>
        <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
          <form action="" method="GET">
            <div class="input-group">
              <input type="text" class="form-control" name="cari" placeholder="Cari Transaksi">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Cari</button>
              </span>
            </div>
          </form>
        </div>
        <table id="table table-bordered" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="text-center">No </th>
              <th class="text-center">Nama </th>
              <th class="text-center">Buku</th>
              <th class="text-center">Tanggal Pinjam</th>
              <th class="text-center">Tanggal Jatuh Tempo</th>
              <th class="text-center">Lama Pinjam</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pinjam as $index => $d)
						<tr class="text-center">
              <td>{{$index + 1}}</td>
							<td>{{ $d->nama }}</td>
							<td>{{$d->buku->judul}}</td>
              <td>{{Carbon\Carbon::parse($d->tgl_pinjam)->translatedFormat('d F Y')}}</td>
              <td>{{Carbon\Carbon::parse($d->tgl_kembali)->translatedFormat('d F Y')}}</td>
              <td> 
                 {{Carbon\Carbon::parse($d->tgl_pinjam)->diffInDays(Carbon\Carbon::parse($d->tgl_kembali))}} Hari
              </td>
              <td> 
                <a class="btn btn-success" href="{{route('penerbit.update',$d->id)}}">Edit</a>
                <a class="btn btn-danger" href="{{route('penerbit.delete',$d->id)}}">Delete</a>
              </td>
						</tr>
						@endforeach
          </tbody>
      </div>
    </div>
  </div>
</div>  
@endsection