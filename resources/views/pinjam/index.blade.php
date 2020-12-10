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
          <form action="{{route('pinjam.cari')}}" method="GET">
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
              <th class="text-center">Sisa Waktu Pinjam</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pinjam as $index => $d)
						<tr class="text-center">
              <td>{{$index + 1}}</td>
							<td>{{ $d->nama }}</td>
              <td>{{$d->buku->judul}}</td>
              
              <td><span class="label label-success">{{Carbon\Carbon::parse($d->tgl_pinjam)->translatedFormat('d F Y')}}</span>
              </td>

              <td><span class="label label-danger">{{Carbon\Carbon::parse($d->tgl_kembali)->translatedFormat('d F Y')}}</span>
              </td>
              <td>
                {{Carbon\Carbon::parse($d->tgl_pinjam)->diffInDays(Carbon\Carbon::parse($d->tgl_kembali))}} Hari
              </td>
              <td>
                @if (Carbon\Carbon::parse($now)->diffInDays(Carbon\Carbon::parse($d->tgl_kembali)) == 0)
                <span class="label label-danger">Buku Harus Di Kembalikan Hari Ini</span>

                @elseif(Carbon\Carbon::parse($now) > (Carbon\Carbon::parse($d->tgl_kembali)) )
                <span class="label label-success">Buku Sudah DiKembalikan</span>

                @elseif(Carbon\Carbon::parse($now) < (Carbon\Carbon::parse($d->tgl_kembali)))
                <span class="label label-success">{{Carbon\Carbon::parse($now)->diffInDays(Carbon\Carbon::parse($d->tgl_kembali))}} Hari Lagi</span>
               
                @endif 
                  
              </td>
              <td> 
                <a class="btn btn-success" href="{{ url('pinjam/update/'.$d->id) }}">Edit</a>
                <a class="btn btn-danger" href="{{ url('pinjam/update/'.$d->id) }}">Delete</a>
              </td>
						</tr>
						@endforeach
          </tbody>
      </div>
    </div>
  </div>
</div>  
@endsection