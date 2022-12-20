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
            <div class="filter-products">
                <select class="form-select" aria-label="Default select example" name="filter-category" required>
                    <option selected >Price</option>
                    {{-- @foreach($projects as $project) --}}
                    {{-- <option value="{{$project->id}}">{{$project->name}}</option> --}}
                    <option value="#">Price</option>
                    <option value="#">A-Z</option>
        
                    {{-- @endforeach --}}
                  </select>
            </div>
            <div class="categories-principal-name"><h3>Categories<h3></div>
            <div id="categories" class="categories">
            <h4 style="margin-left:-90px;">Producer:</h4>
            <a href="{{ url('/category/Apple') }}" style="color:black;"><span><h5>Apple</h5></span></a>
            <a href="{{ url('/category/Samsung')}}" style="color:black;"><h5>Samsung</h5></a>
            <a href="{{ url('/category/Huawei')}}" style="color:black;"><h5>Huawei</h5></a>
            <h4 style="margin-left:-130px;">Color:</h4>
            <a href="{{ url('/category/Apple') }}" style="color:black;"><span><h5>Black</h5></span></a>
            <a href="{{ url('/category/Samsung')}}" style="color:black;"><h5>White</h5></a>
            <a href="{{ url('/category/Huawei')}}" style="color:black;"><h5>Red</h5></a>
            </div>
      <!--Display products section-->
<div class="shop-container">
  <div class="product-div">
    @foreach($phones as $item)
        <div class="product-container" ">
            <a class="overlay" href="{{ URL('/shop/product/'.$item->id )}}"></a>
            <div class="product-photo">
                <a href="{{ URL('/shop/product/'.$item->id )}}"><img src="{{$item->tempUrl}}" width="auto" height="190" style="vertical-align:top; horizontal-align: center;" ></a>
            </div>
            <div class="product-name"><h5 style="color:black;">{{$item->title}}</h5></div>
            <div class="product-name"><h5 style="color:red;">$ {{$item->price}}</h5></div>
        </div>
    @endforeach
</div>   
  </div>
      <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
      <script type="text/javascript" src="{{asset('js/categoriesSticky.js')}}"></script>
@endsection