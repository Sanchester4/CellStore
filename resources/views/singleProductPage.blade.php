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
@foreach($phone as $item)
<div class="super_container">
    <header class="header" style="display: none;">
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    <li><a class="clc" href="#">All Categories</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li data-image="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565713229/single_4.jpg"><img src="{{$item->tempUrl}}" alt=""></li>
                        <li data-image="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565713228/single_2.jpg"><img src="{{$item->tempUrl}}" alt=""></li>
                        <li data-image="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565713228/single_3.jpg"><img src="{{$item->tempUrl}}" alt=""></li>
                    </ul>
                </div>
                <div class="col-lg-4 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{$item->tempUrl}}" alt=""></div>
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Products</a></li>
                                <li class="breadcrumb-item active">Accessories</li>
                            </ol>
                        </nav>
                        <div class="product_name">{{$item->title}} {{$item->color}}, {{$item->ramSize}}Gb RAM, {{$item->romSize}}Gb ROM </div>
                        <div> <span class="product_price">$ {{$item->price}}</span> <strike class="product_discount"> <span style='color:black'>$ {{(((($item->price)/100)*15)+$item->price)}}<span> </strike> </div>
                        <br>
                        <div> <span class="product_info">Warranty: 6 months warranty<span><br> <span class="product_info">7 Days easy return policy<span><br> <span class="product_info">7 Days easy return policy<span><br> <span class="product_info">In Stock: 25 units sold this week<span> </div>
                            <form action="{{route('addToCart')}}" method="post" >
                            <div style="margin-top: 20px;"> 
                            <div class="col-xs-6">
                                <div class="form-group" style="padding-bottom:15px;">
                                    {!! Form::label('quantity', 'Quantity:') !!}
                                    {!! Form::text('quantity' ,null, array('placeholder' => '1','class' => 'form-control')) !!}
                                </div>
                            </div>
        
                                @csrf
                                <input type="hidden"  name="product_id" value="{{$item->id}}">
                                <input type="submit" class="btn btn-primary shop-button" value="Add to Cart">
                            </form>
                            <form action="{{route('addToWishList')}}" method="post" >
                            @csrf
                            <div style="margin-top: -47px; margin-left: 99px;"> 
                                <input type="hidden"  name="product_id" value="{{$item->id}}">
                                <a href="{{ route('getCheckout') }}" class="btn btn-warning btn-block btn-lg">Buy Now</a>
                                    <div class="product_fav"><input type="submit" class="btn btn-primary shop-button" value="Add to Wish List"></div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-5"> 
                                </div>
                                <div class="col-md-7"> </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

            <div class="row row-underline">
                <div class="col-md-6"> <span class=" deal-text">Specifications</span> </div>
                <div class="col-md-6"> <a href="#" data-abc="true"> <span class="ml-auto view-all"></span> </a> </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="col-md-12">
                        <tbody>
                            <tr class="row mt-10">
                                <td class="col-md-4"><span class="p_specification">Sales Package :</span> </td>
                                <td class="col-md-8">
                                    <ul>
                                        <li>A charger and a headphones set</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="row mt-10">
                                <td class="col-md-4"><span class="p_specification">Model :</span> </td>
                                <td class="col-md-8">
                                    <ul>
                                        <li> {{$item->title}} </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="row mt-10">
                                <td class="col-md-4"><span class="p_specification">Production Year :</span> </td>
                                <td class="col-md-8">
                                    <ul>
                                        <li>{{$item->prodYear}}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="row mt-10">
                                <td class="col-md-4"><span class="p_specification">Color :</span> </td>
                                <td class="col-md-8">
                                    <ul>
                                        <li>{{$item->color}}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="row mt-10">
                                <td class="col-md-4"><span class="p_specification">RAM size :</span> </td>
                                <td class="col-md-8">
                                    <ul>
                                        <li>{{$item->ramSize}} Gb</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="row mt-10">
                                <td class="col-md-4"><span class="p_specification">ROM size :</span> </td>
                                <td class="col-md-8">
                                    <ul>
                                        <li>{{$item->romSize}} Gb</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="row mt-10">
                                <td class="col-md-4"><span class="p_specification">Main camera :</span> </td>
                                <td class="col-md-8">
                                    <ul>
                                        <li>{{$item->mainCameraPx}} Px</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="row mt-10">
                                <td class="col-md-4"><span class="p_specification">Frontal camera :</span> </td>
                                <td class="col-md-8">
                                    <ul>
                                        <li>{{$item->frontCameraPx}} Px</li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
@endforeach
@endsection