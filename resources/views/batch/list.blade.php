@extends('layouts.master')
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Batch</li>
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
        Batch Lists
      </div>

      <button type="button" class="btn btn-success float-right btn-create-modal" data-toggle="modal"  data-post="data-php" data-action="create" data-page="prepaidcards" data-title="Prepaid Card">Add</button>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Quantity</th>
              <th>Denomination</th>
              <th>Currency</th>
              <th>ShelfLife</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach($batches as $b)
            <tr>
              <td>{{$b['id']}}</td>
              <td>{{$b['quantity']}}</td>
              <td>{{$b['denomination']}}</td>
              <td>{{$b['currency']}}</td>
              <td>{{$b['shelflife']}}</td>

              <td>
                <a class="btn btn-warning btn-create-modal" data-toggle="modal"  data-post="data-php" data-action="edit" data-id="{{$b['id']}}" data-page="batches" data-title="Batch">Edit</a>
                <a href="{{action('BatchController@destroy', $b['id'])}}" class="btn btn-danger">Delete</a>
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
