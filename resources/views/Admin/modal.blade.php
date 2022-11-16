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
          <form action="{{route('updatePhone')}}" method="post">
            @method('PUT')
            @csrf
            <input type="hidden"  name="id" value="{{$phone->id}}">
            <div class="form-group">
              {!! Form::text('title', $phone->title, array('placeholder' => '{{$phone-title}}','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::text('price', $phone->price, array('placeholder' => '{{$phone->price}}','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::text('color', $phone->color, array('placeholder' => '{{$phone->color}}','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::text('tempUrl', $phone->tempUrl, array('placeholder' => '{{$phone->tempUrl}}','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::text('producedBy', $phone->producedBy, array('placeholder' => '{{$phone->producedBy}}','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::text('prodYear', $phone->prodYear, array('placeholder' => '{{$phone->prodYear}}','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::text('ramSize', $phone->ramSize, array('placeholder' => '{{$phone->ramSize}}','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::text('romSize', $phone->romSize, array('placeholder' => '{{$phone->romSize}}','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::text('mainCameraPx', $phone->mainCameraPx, array('placeholder' => '{{$phone->mainCameraPx}}','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::text('frontCameraPx', $phone->frontCameraPx, array('placeholder' => '{{$phone->frontCameraPx}}','class' => 'form-control')) !!}
            </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Refresh">
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

