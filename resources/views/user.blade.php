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

 <!--Profile SEctiova-->
 @foreach($users as $user)
 <div class="container rounded mt-5 mb-5">
   <div class="row">
     <div class="col-md-3 border-right">
       <div
         class="d-flex flex-column align-items-center text-center p-3 py-5"
       >
         <div class="profile-pic">
           <label class="-label" for="file">
             <span>Change Image</span>
           </label>
           <input id="file" type="file" onchange="loadFile(event)" />
           <img
             src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
             id="output"
             width="200"
           />
         </div>
         
       
         <span class="text-black-50">{{$user->email}}</span>
       </div>
     </div>
     <div class="col-md-5 border-right border-bottom border-top">
       <div class="p-5 py-5">
         <div class="d-flex justify-content-between align-items-center mb-3">
           <h4 class="text-right">My Profile</h4>
         </div>
         <div class="row mt-2">
           <div class="col-md-6">
             <label class="labels">Full Name</label>
           </div>
           <label class="text-black-100">{{$user->name}}</label>
         </div>
         <div class="row mt-2">
           <div class="col-md-12">
             <label class="labels">Password</label
             ><input
               id="myInput"
               type="password"
               class="form-control"
               value="{{$user->password}}"
             />
           </div>
           <div class="col-md-12">
             <input type="checkbox" onclick="myFunction()" />Show Password
           </div> 
         </div>
       </div>
     </div>
   </div>
 </div>
@endforeach

<div class="container mb-5 mt-5">
  <div class="row text-center">
      <div class="col-md-12 col-lg-12">
          <div class="row text-muted">
              <div class="col-lg-12 col-md-12 dashhead-subtitle h6 text-capitalize text-muted">
                  <h1>History of orders:</h1>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-12">
          <div class="row mt-5">
            <div class="col-1">
              </div>
              <div class="col-2">
              <h5>Order Number</h5>
              </div>
              <div class="col-2">
                  <h5>Products</h5>
              </div>
              <div class="col-1">
                  <h5>Price</h5>
              </div>
              <div class="col-1">
                  <h5>Quantity</h5>
              </div>
              <div class="col-3">
                <h5>Date</h5>
            </div>
              <div class="col-2">
                  <h5>Total</h5>
              </div>
          </div>
          @foreach($orders as $order)
          @foreach($phones as $phone)
          @if($order->product_id == $phone->id)
          <div class="row" style="padding-bottom:10px;">
            <div class="col-1">
            </div>
              <div class="col-2">
                <span id="price_1">#{{$order->order_number}}</span>
               </div>
              <div class="col-2">
                <a href="/shop/product/{{$phone->id}}"><span id="price_1">{{$phone->title}}</span></a>
              </div>
              <div class="col-1">
                  <span id="price_1">$ {{$phone->price}}</span>
              </div>
              <div class="col-1">
                  <span id="price_1">1</span>
              </div>
              <div class="col-3">
                <span id="price_1">{{$order->created_at}}</span>
            </div>
              <div class="col-2">
                  <span id="total_1" style="color:red;">$ {{$phone->price}}</span>
              </div>
          </div>
          @endif
          @endforeach
@endforeach
      </div>
  </div>
</div>


 <script>
   function myFunction() {
     var x = document.getElementById("myInput");
     if (x.type === "password") {
       x.type = "text";
     } else {
       x.type = "password";
     }
   }
 </script>
<script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
@endsection