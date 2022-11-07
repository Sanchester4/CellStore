<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- Bootstap --}}

        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    </head>
    <body>
            <!-- Navbar Section-->
    <nav class="navbar">
        <div class="navbar__container">
          <a href="/" id="navbar__logo"
            ><ion-icon name="cut-outline"></ion-icon>CellStore
          </a>
          <div class="navbar__toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
          <ul class="navbar__menu">
            <li class="navbar__item">
              <a href="shop" class="navbar__links" id="products-page"
                ><i class="fa-brands fa-product-hunt"></i> Products</a
              >
            </li>
            <li class="navbar_item">
              <a href="cart.html" class="navbar__links" id="cart-page"
                ><i class="fas fa-store"></i> Cart</a
              >
            </li>
            @if (Auth::guest())
            <li class="navbar_btn">
                <a href="{{ route('login') }}" class="button" id="signin-page"
                  >Login</a>
              </li>
        @else
            {{-- {{ Auth::user()->name }} --}}
            <li class="navbar_item">
                <a href="{{ route('profile') }}" class="navbar__links" id="contac-page"
                  ><i class="fa fa-user"></i> Profile</a
                >
              </li>
            <form action="{{ route('logout') }}" method="post" style="display:contents">
                @csrf
                <button type="submit" class="btn btn-primary btn-block" style="text-size: 14px">Logout</button>
              </form>
        @endif
          </ul>
        </div>
      </nav>
        @yield('content')

        {{-- <script type="text/javascript" src="{{asset('js/app.js')}}"></script> --}}
    </body>
</html>