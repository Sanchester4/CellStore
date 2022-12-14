<head>
	<meta charset="UTF-8">
	<title>Add Phones</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
</head>
<body>
	<div class="container">
		@if ($message = Session::get('message'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
              @endif
		<div class="row">
			<div class="col mt-2">
				<button class="btn btn-success mt-2" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i></button>
				<table class="table shadow " style="margin-top: 0px;">
					<thead class="thead-dark">
						<tr>
							<th>Id</th>
							<th>Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>Image</th>
							<th>**</th>
						</tr>
						<tr>
                            @foreach($phones as $phone)
							<td>{{$phone->id}}</td>
							<td>{{$phone->title}}</td>
							<td>Manufacturer: {{$phone->producedBy}}<br>RAM size: {{$phone->ramSize}}</td>
							<td>{{$phone->id}}</td>
							<td><img class = "imageTable" src="{{$phone->tempUrl}}"></td>
							<td>
                              
								<a href="/edit/{{$phone->id}}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal{{$phone->id}}"><i class="fa fa-edit"></i></a> 
								<a href="/delete/{{$phone->id}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$phone->id}}"><i class="fa fa-trash"></i></a>
								@include('Admin.modal')
							</td>
						</tr>
                        @endforeach
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Add your content</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
                  <form action="/addPhone" method="post">
					@csrf
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="name" value="" placeholder="Phone Name">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="price" value="" placeholder="Price">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="color" value="" placeholder="Color">
	        	</div>
				<div class="form-group">
	        		<input type="text" class="form-control" name="tempUrl" value="" placeholder="Image Url">
	        	</div>
				<div class="form-group">
	        		<input type="text" class="form-control" name="factory" value="" placeholder="Produced By">
	        	</div>
				<div class="form-group">
	        		<input type="text" class="form-control" name="prodYear" value="" placeholder="Production Year">
	        	</div>
				<div class="form-group">
	        		<input type="text" class="form-control" name="ramSize" value="" placeholder="RAM Size">
	        	</div>
				<div class="form-group">
	        		<input type="text" class="form-control" name="romSize" value="" placeholder="ROM Size">
	        	</div>
				<div class="form-group">
	        		<input type="text" class="form-control" name="mainCamera" value="" placeholder="Main Camera Px">
	        	</div>
				<div class="form-group">
	        		<input type="text" class="form-control" name="secondCamera" value="" placeholder="Frontal Camera Px">
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="submit" name="submit" class="btn btn-primary">Add</button>
	      </div>
	  		</form>
	    </div>
	  </div>
	</div>

    
      <div class="d-flex justify-content-center">
        {!! $phones->links() !!}
    </div>   

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
	</html>