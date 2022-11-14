<div class="modal fade" id="editModal{{$phone->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content shadow">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit a data row with value id {{$phone->id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/updatePhone" method="post">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="name" value="{{$phone->title}}" placeholder="Phone Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="price" value="{{$phone->price}}" placeholder="Price">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="color" value="{{$phone->color}}" placeholder="Color">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="tempUrl" value="{{$phone->tempUrl}}" placeholder="Image Url">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="factory" value="{{$phone->producedBy}}" placeholder="Produced By">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="prodYear" value="{{$phone->prodYear}}" placeholder="Production Year">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="ramSize" value="{{$phone->ramSize}}" placeholder="RAM Size">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="romSize" value="{{$phone->romSize}}" placeholder="ROM Size">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="mainCamera" value="{{$phone->mainCameraPx}}" placeholder="Main Camera Px">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="secondCamera" value="{{$phone->frontCameraPx}}" placeholder="Frontal Camera Px">
            </div>
            <div class="form-group" style="display:none;">
              <input type="text" class="form-control" name="secondCamera" value="{{$phone->id}}" placeholder="Frontal Camera Px">
            </div>
            </div>
              <div class="modal-footer">
                  <button type="submit" name="edit-submit" class="btn btn-primary">Refresh</button>
              </div>
          </form>	
        </div>
      </div>
    </div>
  </div>
 

  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal{{$phone->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content shadow">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete the phone with value id = {{$phone->id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <form action="{{ url('/delete/'.$phone->id) }}" method="post">
            @csrf
              <button type="submit" name="delete_submit" class="btn btn-danger" style="margin-top: 15px;">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>

