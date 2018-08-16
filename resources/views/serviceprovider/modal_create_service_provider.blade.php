
<div class="modal-header">
  <h4 class="modal-title">Create Service Provider</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>

</div>
<form method="post" action="{{url('serviceproviders')}}" enctype="multipart/form-data">
<div class="modal-body">

    @csrf
    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <label for="Name">Name:</label>
        <input type="text" class="form-control" name="name">
      </div>
    </div>


    <div class="row">
      <div class="col-md-12"></div>
      <div class="form-group col-md-12">
        <input type="file" name="filename">
     </div>
    </div>



 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

   <button type="submit" class="btn btn-success" data-slug="">Save</button>
 </div>
 </form>
