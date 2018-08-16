
<div class="modal-header">
  <h4 class="modal-title">Edit Prepaid Card</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>

</div>
<form method="post" action="{{action('PrepaidCardController@update', $id)}}"  >
<div class="modal-body">

    @csrf
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Voucher Code:</label>
        <input type="text" class="form-control" name="voucher_code" value="{{$prepaidCard->voucher_code}}">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Password:</label>
        <input type="text" class="form-control" name="password" >
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Expiry Date:</label>
        <input type="text" class="form-control" name="expiry_date" value="{{$prepaidCard->expiry_date}}">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Value:</label>
        <input type="number" class="form-control" name="value" value="{{$prepaidCard->value}}">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Redemption Status:</label>
        <select class="form-control" name="redemption_status" value="{{$prepaidCard->redemption_status}}">
          <option value="not yet redeem" {{ $prepaidCard->redemption_status == "not yet redeem"  ? 'selected' : '' }}>Not Yet Redeem</option>
          <option value="redeemed" {{ $prepaidCard->redemption_status == "redeemed"  ? 'selected' : '' }}>Redeemed</option>
          <option value="suspended" {{ $prepaidCard->redemption_status == "suspeded"  ? 'selected' : '' }}>Suspended</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Service Provider:</label>
        <select class="form-control" name="service_provider_id" value="{{$prepaidCard->service_provider_id}}">
          <option value="">Please select...</option>
          @foreach($serviceProviders as $sp)
            <option value="{{$sp->id}}" {{ $sp->id == $prepaidCard->service_provider_id  ? 'selected' : '' }}>{{$sp->name}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Batch Number:</label>
        <select class="form-control" name="service_provider_id">
          <option value="">Please select...</option>
          @foreach($batches as $b)
            <option value="{{$b->id}}" {{ $b->id == $prepaidCard->batch_id  ? 'selected' : '' }}>{{$b->id}}</option>
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
