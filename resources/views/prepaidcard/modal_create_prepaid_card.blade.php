
<div class="modal-header">
  <h4 class="modal-title">Create Prepaid Card</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>

</div>
<form method="post" action="{{url('prepaidcards')}}" enctype="multipart/form-data">
<div class="modal-body">

    @csrf
    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Voucher Code:</label>
        <input type="text" class="form-control" name="voucher_code">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Password:</label>
        <input type="text" class="form-control" name="password">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Expiry Date:</label>
        <input type="text" class="form-control" name="expiry_date">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Value:</label>
        <input type="number" class="form-control" name="value">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Redemption Status:</label>
        <select class="form-control" name="redemption_status">
          <option value="not yet redeem">Not Yet Redeem</option>
          <option value="redeemed">Redeemed</option>
          <option value="redeemed">Suspended</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Service Provider:</label>
        <select class="form-control" name="service_provider_id">
          <option value="">Please select...</option>
          @foreach($serviceProviders as $sp)
            <option value="{{$sp->id}}">{{$sp->name}}</option>
          @endforeach
        </select>
      </div>
    </div>


 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

   <button type="submit" class="btn btn-success" data-slug="">Save</button>
 </div>
 </form>
