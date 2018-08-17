@extends('layouts.master')
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Prepaid Card Generator</li>
  </ol>

  @if (\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success') }}</p>
    </div><br />
   @endif

  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Generate Prepaid Card
      </div>
      <form method="post" action="{{url('prepaidcards/generate')}}" enctype="multipart/form-data">
        <div class="card-body">
          <!-- @csrf -->
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <!-- <input name="_method" type="hidden" value="PUT"> -->
          <div class="form-group row">
            <label for="service_provider_id" class="col-2 col-form-label">Service Provider</label>
            <div class="col-5">
              <select class="form-control" id="service_provider_id" name="service_provider_id">
                <option value="">Please select...</option>
                @foreach($serviceProviders as $sp)
                  <option value="{{$sp->id}}">{{$sp->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="quantity" class="col-2 col-form-label">Quantity</label>
            <div class="col-5">
              <input class="form-control" type="number" value="" id="quantity" name="quantity">
            </div>
          </div>
          <div class="form-group row">
            <label for="denomination" class="col-2 col-form-label">Denomination</label>
            <div class="col-5">
              <input class="form-control" type="number" value="" id="denomination" name="denomination">
            </div>
          </div>
          <div class="form-group row">
            <label for="currency" class="col-2 col-form-label">Currency</label>
            <div class="col-5">
              <input class="form-control" type="text" value="$" id="currency" name="currency">
            </div>
          </div>
          <div class="form-group row">
            <label for="shelflife" class="col-2 col-form-label">Shelf Life (Expiry Date)</label>
            <div class="col-5">
              <input class="form-control" type="date" id="shelflife" name="shelflife">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-2 col-form-label"></div>
            <div class="col-5">
              <button type="submit" class="btn btn-primary">Generate</button>
            </div>
          </div>

        </div>
      </form>

    </div>
    <div class="card-header">
      <div class="float-left">
        <i class="fas fa-table"></i>
        Prepaid Card Lists
      </div>

      <button type="button" class="btn btn-success float-right btn-create-modal" data-toggle="modal"  data-post="data-php" data-action="create" data-page="prepaidcards" data-title="Prepaid Card">Add</button>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Batch</th>
              <th>Voucher Code</th>
              <th>Expiry Date</th>
              <th >Value</th>
              <th >Service Provider</th>
              <th >Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach($prepaidCards as $key =>  $prov)
            <tr>
              <td>{{$prov->id}}</td>
              <td>{{$prov->batch_id}}</td>
              <td>{{$prov->voucher_code}}</td>
              <td>{{$prov->expiry_date}}</td>
              <td>{{$prov->value}}</td>
              <td>{{$prov->serviceProvider->name}}</td>

              <td>
                <a class="btn btn-warning btn-create-modal" data-toggle="modal"  data-post="data-php" data-action="edit" data-id="{{$prov->id}}" data-page="prepaidcards" data-title="Prepaid Card">Edit</a>
                <a href="{{action('PrepaidCardController@destroy', $prov->id)}}" class="btn btn-danger">Delete</a>
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
