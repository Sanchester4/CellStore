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

      <!--Home SEctiova-->

        <div class="product-container" >
            <div class="product-photo">
                <a href="productPage.html"><img src="https://media.croma.com/image/upload/v1664009482/Croma%20Assets/Communication/Mobiles/Images/243461_0_tzq0y4.png" width="190" height="190" style="vertical-align:top"></a>
            </div>
        </div>

      <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"></script>
@endsection