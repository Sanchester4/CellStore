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
      <!--Home SEctiova-->
      <div class="slider-container">
        <div class="slider">
          <div class="slides">
            <div id="slides__1" class="slide">
              <span class="slide__text"><img src ="{{asset('/images/1.jpg')}}" width="1000" height="600"></span>
              <a class="slide__prev" href="#slides__4" title="Next"></a>
              <a class="slide__next" href="#slides__2" title="Next"></a>
            </div>
            <div id="slides__2" class="slide">
              <span class="slide__text"><img src ="{{asset('/images/2.jpg')}}" width="1000" height="600"></span>
              <a class="slide__prev" href="#slides__1" title="Prev"></a>
              <a class="slide__next" href="#slides__3" title="Next"></a>
            </div>
            <div id="slides__3" class="slide">
              <span class="slide__text">3</span>
              <a class="slide__prev" href="#slides__2" title="Prev"></a>
              <a class="slide__next" href="#slides__4" title="Next"></a>
            </div>
            <div id="slides__4" class="slide">
              <span class="slide__text">4</span>
              <a class="slide__prev" href="#slides__3" title="Prev"></a>
              <a class="slide__next" href="#slides__1" title="Prev"></a>
            </div>
          </div>
          <div class="slider__nav">
            <a class="slider__navlink" href="#slides__1"></a>
            <a class="slider__navlink" href="#slides__2"></a>
            <a class="slider__navlink" href="#slides__3"></a>
            <a class="slider__navlink" href="#slides__4"></a>
          </div>
        </div>
      </div>
      <div class="container-of-container">
        <h2 style="margin-left:100px;">More benefits at online orders</h2>
      <div class="presentation-container">
            <div class="presentation-item"><i class="fa-regular fa-credit-card fa-3x"></i>
            <h5 style="margin-top: 0px;">Card Payment</h5>
            <p style="margin-top: -25px;">Buy on the spot and pay by card</p>
          </div>
            <div class="presentation-item"><i class="fa-solid fa-truck fa-3x"></i>
              <h5 style="margin-top: 0px;">Free Delivery</h5>
              <p style="margin-top: 0px;">No additional costs for transport, for any order worth more than 50$</p>
            </div>
            <div class="presentation-item"><i class="fa-regular fa-calendar fa-3x"></i>
              <h5 style="margin-top: 0px;">Return within 30 days</h5>
              <p style="margin-top: 0px;">No additional costs for the first 30 days after delivery</p>
            </div>
            <div class="presentation-item"><i class="fa-solid fa-earth-americas fa-3x"></i>
              <h5 style="margin-top: 0px;">Buy from anywhere</h5>
              <p style="margin-top: 0px;">Buy regardless of which country you are from</p>
            </div>
            <div class="presentation-item"><i class="fa-solid fa-shield fa-3x"></i>
              <h5 style="margin-top: 0px;">Phone insurance</h5>
              <p style="margin-top: 0px;">Basic or extended insureance for each device</p>
            </div>
            <div class="presentation-item"><i class="fa-solid fa-screwdriver-wrench fa-3x"></i>
              <h5 style="margin-top: 0px;">Service</h5>
              <p style="margin-top: 0px;">Specialized support for any brand phone</p>
            </div>
            <div class="presentation-item"><i class="fa-solid fa-unlock-keyhole fa-3x"></i>
              <h5 style="margin-top: 0px;">Free unlock</h5>
              <p style="margin-top: 0px;">For phones or tablets purchased at standard price</p>
            </div>
            <div class="presentation-item"><i class="fa-solid fa-arrows-rotate fa-3x"></i>
              <h5 style="margin-top: 0px;">Stock update 24/7</h5>
              <p style="margin-top: 0px;">We make sure that the products you need are always in stock</p>
            </div>
      </div>
    <div class="container-brands">
      <h2  style="margin-left:100px;">Choose your favourite brand</h2>
        <div class="container-items">
          <span class="brand-item"><img src ="{{asset('/images/apple.png')}}" width="55%" height="auto"></span>
          <span class="brand-item" style="margin-top: 30px;"><img src ="{{asset('/images/huawei.png')}}" width="40%" height="auto"></span>
          <span class="brand-item" style="margin-top: -50px;"><img src ="{{asset('/images/samsung.png')}}" width="80%" height="auto"></span>

          {{-- </div class="brand-item"><img src ="{{asset('/images/apple.png')}}" width="15%" height="auto"></div> --}}
        {{-- </div class="brand-item"><img src ="{{asset('/images/huawei.png')}}" width="5%" height="5%"></div> --}}
        </div class="brand-item"></div>
       </div>
    </div>
    {{-- <div class="footer">
    </div> --}}
  </div>
      <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"></script>
@endsection