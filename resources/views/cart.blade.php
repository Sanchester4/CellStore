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
            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
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
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                  <button class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus"></i>
                  </button>
  
                  <input id="form1" min="0" name="quantity" value="{{$cart->quantity}}" type="number"
                    class="form-control form-control-sm" />
  
                  <button class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">{{$phone->price}}$</h5>
                </div>
                <div class="col-md-2">
                  <form action="{{route('deleteFromCart')}}" method="post">
                    @csrf
                    <input type="hidden"  name="product_id" value="{{$phone->id}}">
                    <input type="submit" class="btn btn-danger" value="Delete from Cart" style="margin-right: -205px;">
                  {{-- <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a> --}}

                </form>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach
@endforeach
        
  
          <div class="card mb-4">
            <div class="card-body p-4 d-flex flex-row">
              <div class="form-outline flex-fill">
                <input type="text" id="form1" class="form-control form-control-lg" />
                <label class="form-label" for="form1">Discound code</label>
              </div>
              <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
            </div>
          </div>
  
          <div class="card">
            <div class="card-body">
              <a href="{{ route('getCheckout') }}" class="btn btn-warning btn-block btn-lg">Proceed to Pay</a>
              {{-- <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button> --}}
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </section>
  <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
@endsection