@extends('layouts.master')
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Service Provider</li>
  </ol>

  @if (\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success') }}</p>
    </div><br />
   @endif

  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <div class="float-left">
        <i class="fas fa-table"></i>
        Service Providers List
      </div>

      <button type="button" class="btn btn-success float-right btn-create-modal" data-toggle="modal"  data-post="data-php" data-action="create" data-page="serviceproviders" data-title="Service Provider">Add</button>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Logo</th>
              <th >Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach($serviceProviders as $prov)
            <tr>
              <td>{{$prov['id']}}</td>
              <td>{{$prov['name']}}</td>
              <td>{{$prov['logo_url']}}</td>

              <td>
                <a class="btn btn-warning btn-create-modal" data-toggle="modal"  data-post="data-php" data-action="edit" data-id="{{$prov['id']}}" data-page="serviceproviders" data-title="Service Provider">Edit</a>
                <a href="{{action('ServiceProviderController@destroy', $prov['id'])}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach


          </tbody>
        </table>
      </div>
    </div>

  </div>

</div>




<!-- /.container-fluid -->
@stop
