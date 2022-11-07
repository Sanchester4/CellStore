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

    <div class="cart-container">
    <div class="cart-items">
    
    </div>
    </div>
    <button class="btn btn-primary">Checkout</button>
    {{-- <script src="../js/login.js"></script> --}}
@endsection