@extends('layouts/master')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>List Penulis</h2>
        <ul class="nav navbar-right panel_toolbox">
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="table table-bordered" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="text-center">No </th>
              <th class="text-center">Nama </th>
              <th class="text-center">Alamat </th>
              <th class="text-center">No Handphone</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($penulis as $index=>$d)
						<tr class="text-center">
              <td>{{$index + 1}}</td>
							<td>{{ $d->nama }}</td>
							<td>{{ $d->alamat }}</td>
              <td>{{ $d->no_hp }}</td>
              <td> 
                <a class="btn btn-success" href="{{route('penulis.update',$d->id)}}">Edit</a>
                <a class="btn btn-danger" href="{{route('penulis.delete',$d->id)}}">Delete</a>
              </td>
						</tr>
						@endforeach
          </tbody>
      </div>
    </div>
  </div>
</div>  
<script>

</script>
@endsection