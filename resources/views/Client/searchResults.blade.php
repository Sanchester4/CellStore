@extends('base')
@section('content')

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
<div class="row d-flex justify-content-center" style="margin-top: 25px;">
    <div class="text-center" > 
        <h5>The results of the search:</h5>
        @if ($message = Session::get('message'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
</div>
      <!--Display products section-->
  <div class="product-div row d-flex justify-content-center" style="margin-top: 0px; margin-bottom: 60px;" >
    @foreach($phones as $phone)
        <div class="product-container">
            <a class="overlay" href="{{ URL('/shop/product/'.$phone->id )}}"></a>
            <div class="product-photo">
                <a href="{{ URL('/shop/product/'.$phone->id )}}"><img src="{{$phone->tempUrl}}" width="auto" height="190" style="vertical-align:top; horizontal-align: center;" ></a>
            </div>
            <div class="product-name"><h5 style="color:black;">{{$phone->title}}</h5></div>
            <div class="product-name"><h5 style="color:red;">$ {{$phone->price}}</h5></div>
        </div>
    @endforeach

  </div>
      <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
      <script type="text/javascript" src="{{asset('js/categoriesSticky.js')}}"></script>
@endsection