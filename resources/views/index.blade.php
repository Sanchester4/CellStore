<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CellStore</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        <!-- Navbar Section-->
    <nav class="navbar">
        <div class="navbar__container">
          <a href="#home" id="navbar__logo"
            ><ion-icon name="cut-outline"></ion-icon>CellStore
          </a>
          <div class="navbar__toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
          <ul class="navbar__menu">
            <li class="navbar__item">
              <a href="products.html" class="navbar__links" id="products-page"
                ><i class="fa-brands fa-product-hunt"></i> Products</a
              >
            </li>
            <li class="navbar_item">
              <a href="cart.html" class="navbar__links" id="cart-page"
                ><i class="fas fa-store"></i> Cart</a
              >
            </li>
            <li class="navbar_item">
              <a href="profile.html" class="navbar__links" id="contac-page"
                ><i class="fa fa-user"></i> Profile</a
              >
            </li>
  
            <li class="navbar_btn">
              <a href="login.html" class="button" id="signin-page"
                ><i class="fa-solid fa-right-to-bracket"></i> </a>
            </li>
            <li class="navbar_btn">
                <a href="logout.html" class="button" id="signup-page"
                  ><i class="fa fa-power-off"></i
                ></a>
              </li>
          </ul>
        </div>
      </nav>
      <!--Home SEctiova-->

        <div class="product-container">
            <div class="product-photo">
                <img src="https://media.croma.com/image/upload/v1664009482/Croma%20Assets/Communication/Mobiles/Images/243461_0_tzq0y4.png" width="190" height="190" style="vertical-align:top">
            </div>
        </div>

      <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"></script>
    </body>
</html>
