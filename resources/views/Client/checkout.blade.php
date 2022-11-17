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

@if ($message = Session::get('message'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
              @endif
              <?php $total = 0;?>
    <div class="container mb-5 mt-5">
        <div class="row text-center">
            <div class="col-md-12 col-lg-12">
                <div class="row text-muted">
                    <div class="col-lg-12 col-md-12 dashhead-subtitle h6 text-capitalize text-muted">
                        <h1>Your cart products</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-4">
                        <h5>Products</h5>
                    </div>
                    <div class="col-2">
                        <h5>Price</h5>
                    </div>
                    <div class="col-3">
                        <h5>Quantity</h5>
                    </div>
                    <div class="col-2">
                        <h5>Total</h5>
                    </div>
                    <div class="col-1">
                        <h5></h5>
                    </div>
                </div>
                @foreach($carts as $cart)
                @foreach($phones as $phone)
                @if($cart->product_id == $phone->id)
                <div class="row" style="padding-bottom:10px;">
                    <div class="col-4">
                        {{$phone->title}}
                    </div>
                    <div class="col-2">
                        <span id="price_1">$ {{$phone->price}}</span>
                    </div>
                    <div class="col-3">
                        <span id="price_1">{{$cart->quantity}}</span>
                    </div>
                    <div class="col-2">
                        <span id="total_1">$ {{$phone->price}}</span>
                    </div>
                    <div class="col-3" style="margin-left:1100px; margin-top:-28px;">
                        <form action="{{route('deleteFromCart')}}" method="post">
                            @csrf
                            <input type="hidden"  name="product_id" value="{{$phone->id}}">
                        <input type="submit" class="btn btn-danger" value="Remove">
                    </form>
                    </div>
                </div>
                <?php $total = $total + $phone->price;?>
                @endif
                @endforeach
      @endforeach
            </div>
        </div>
    </div>
    
    <div class="container mb-5 mt-5 " style="padding-bottom: -20px;">
        <div class="row justify-content-center">
            <div class="col-9 my-4 py-1">
                <h2 class="text-center">Contact information</h2>
            </div>
        </div>
<form action="{{route('addOrder')}}" method="post">
 @csrf
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="row justify-content-center">
                    <div class="col-12" style="font-size: 18px;">
                        Shipping address
                    </div>
                </div>
            </div>
        </div>
            <div class="col-12 mt-4">
                <div class="row">
                    <div class="col-6">
                        <div class="w-100">
                          {!!  Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="w-100">
                            {!!  Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="w-100">
                    {!!  Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="row">
                    <div class="col-6">
                        <div class="w-100">
                            {!!  Form::text('city', null, array('placeholder' => 'City Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="w-100">
                            {!!  Form::text('post_code', null, array('placeholder' => 'Postal Code','class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="w-100">
                    {!!  Form::text('phone_number', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
                </div>
            </div>
        </div>
    </div>
    <span class=" pl-4" style="margin-left: 110px;">
        <input class="form-check-input" style="cursor:pointer;" type="checkbox" name="cbEmailOffers" id="cbEmailOffers">
        <small class="txtEmail-field text-muted">Email me with news and offers</small>
    </span>
    <span class=" pl-4">
        <input class="form-check-input" style="cursor:pointer;" type="checkbox" name="cbEmailOffers" id="cbEmailOffers">
        <small class="txtEmail-field text-muted">Email me with news and offers</small>
    </span>
    <div class="container" style="margin-left: 100px;">
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="row justify-content-center">
                    <div class="col-12" style="font-size: 30px;">
                        Shipping method
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="form-check">
                   {{ Form::radio('delivery', 'Fan Courier') }}
                   <label class="form-check-label" for="rbDHL">
                    Fan Courier
                </label>
                </div>
                <div class="form-check">
                    {{ Form::radio('delivery', 'DHL') }}
                    <label class="form-check-label" for="rbDHL">
                        DHL
                    </label>
                </div>
                <div class="form-check">
                    {{ Form::radio('delivery', 'Post') }}
                    <label class="form-check-label" for="rbExpress">
                        Via post
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5 mt-5">
        <div id="pnlCreditCardSection" class="mt-5">
            <div class="mx-auto">
                <div class="row justify-content-center">
                    <div class="col-9 my-4 py-1">
                        <h2 class="text-center">Credit &amp; Debit Cards Information</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7 mt-3 mt-lg-0 text-center mx-auto">
    
                        <!--Hosted Field for CC number-->
                        <div class="row mb-4">
                            <div class="col-lg-1 col-md-1"></div>
                            <div class="col-lg-3 col-md-3 col-12 text-left">
                                <span class="text-muted recorddetaillabel mr-1">Card Number *</span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-right text-sm-left">
                                <div class="row">
                                    <div class="col-12 pr-1">
                                        <div class="input-group">
                                            <div class="w-100" aria-label="Card Number" aria-describedby="card-number-logo">
                                                <input type="number" class="center-block form-control" id="card-number" required/>
                                            </div>
                                            <div id="card-logo" class="pt-2 mx-2 input-group-append">
                                                <img alt="card image" src="https://files.readme.io/9018c4f-Visa.png" height="20px" id="card-number-logo">
                                            </div>
                                        </div>
                                        <span class="helper-text text-left" id="ccn-help"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!--Hosted Field for CC EXP-->
                        <div class="row mb-4">
                            <div class="col-lg-1 col-md-1"></div>
                            <div class="col-lg-3 col-md-3 col-12 text-left">
                                <span class="text-muted recorddetaillabel mr-1">Exp. Date *</span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-right text-sm-left">
                                <div class="row">
                                    <div class="col-12 pr-1">
                                        <div class="input-group">
                                            <div class="mr-2" data-bluesnap="exp">
                                                <input type="date" value="2022-01-01" min="2000-01-01" class="center-block form-control" id="exp-date"/>
                                            </div>
                                        </div>
                                        <span class="helper-text text-left" id="exp-help"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!--Hosted Field for CC CVV-->
                        <div class="row mb-4">
                            <div class="col-lg-1 col-md-1"></div>
                            <div class="col-lg-3 col-md-3 col-12 text-left">
                                <span class="text-muted recorddetaillabel mr-1">Security Code *</span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-right text-sm-left">
                                <div class="row">
                                    <div class="col-12 pr-1">
                                        <div class="input-group">
                                            <div class="mr-2" data-bluesnap="cvv">
                                                <input type="text" class="center-block form-control" id="cvv" required/>
                                            </div>
                                        </div>
                                        <span class="helper-text text-left" id="cvv-help"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-1 col-md-1"></div>
                            <div class="col-lg-3 col-md-3 col-12 text-left">
                                <span class="text-muted recorddetaillabel mr-1">Amount ($): </span>
                                    <div class="row">
                                        <div class="col-12 pr-5">
                                                <div class="mr-4" data-bluesnap="cvv">
                                                    <h5 style="margin-left:192px; margin-top: -24px;"><?php echo($total)?></h5>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 justify-content-center" style="margin-bottom: 20px;">
        <div class="col-2">
            <input type="submit" value="Finish the order" class="btn" style="background-color: #04AA6D;color: white;padding: 12px;margin: 10px 0;border: none;width: 100%;border-radius: 3px;cursor: pointer;font-size: 17px;">
        </div>
    </div>
</form>
    
    
  <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
@endsection