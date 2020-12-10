@extends('layouts/master')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>List Buku</h2>
        <ul class="nav navbar-right panel_toolbox">
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
          <form action="{{route('buku.cari')}}" method="GET">
            <div class="input-group">
              <input type="text" class="form-control" name="cari" placeholder="Cari Buku">
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
              <th class="text-center">Judul </th>
              <th class="text-center">Tanggal Terbit </th>
              <th class="text-center">Jumlah </th>
              <th class="text-center">Kategori</th>
              <th class="text-center">Penulis</th>
              <th class="text-center">Penerbit</th>
              <th class="text-center">Status </th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($buku as $index => $d)
						<tr class="text-center">
              <td>{{$index + 1}}</td>
							<td>{{ $d->judul }}</td>
              <td>{{Carbon\Carbon::parse($d->tgl_terbit)->translatedFormat('d F Y')}}</td>
              <td>{{ $d->jumlah}}</td>
              <td>{{ $d->kategori->nama }}</td>
              <td>{{ $d->penulis->nama }}</td>
              <td>{{ $d->penerbit->nama }}</td>
              <td>
                @if ( $d->jumlah > 0)
                <span class="label label-success">Buku Dapat Di Pinjam</span>

                @else
                <span class="label label-danger">Buku Tidak Dapat Di Pinjam</span>
                @endif
              </td>
              <td> 
                <a class="btn btn-success" href="{{ url('buku/update/'.$d->id) }}">Edit</a>
                <a class="btn btn-danger" href="{{ url('buku/delete/'.$d->id) }}">Delete</a>
              </td>
						</tr>
						@endforeach
          </tbody>
      </div>
    </div>
  </div>
</div>  
<script>
  $(document).ready(function() {
  $('#datatable').DataTable();
} );
</script>
@endsection