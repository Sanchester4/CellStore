@extends('base')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
  
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">Wish List</h3>
            <div>
              <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                    class="fas fa-angle-down mt-1"></i></a></p>
            </div>
          </div>
          @foreach($carts as $cart)
         @foreach($phones as $phone)
         @if($cart->product_id == $phone->id)
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <a href="{{ URL('/shop/product/'.$phone->id )}}"><img
                    src="{{ $phone->tempUrl}}"
                    class="img-fluid rounded-3" alt="Cotton T-shirt"></a>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2">{{$phone->title}}</p>
                  <p><span class="text-muted">Color: </span>{{$phone->color}}</p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">Price:  {{$phone->price}}$</h5>
                </div>
                <div class="col-md-2">
                  <form action="{{route('deleteFromWishList')}}" method="post">
                    @csrf
                    <input type="hidden"  name="product_id" value="{{$phone->id}}">
                    <input type="submit" class="btn btn-danger" value="Delete from Wish List" style="margin-right: -205px;">
                  {{-- <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a> --}}

                </form>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach
@endforeach
  
        </div>
      </div>
    </div>
  </section>
  <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
@endsection