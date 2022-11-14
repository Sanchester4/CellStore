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
    <div class="box-form">
        <form action="{{route('login')}}" method="post">
        @csrf
          <div class="inputs">
            @if ($errors->has('email'))
            <div class="alert alert-danger">{{$errors->first('email')}}</div> @endif
            <input name="email" type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" placeholder="Email" value="{{old('email')}}">
            <br/>
            @if ($errors->has('password'))
            <div class="alert alert-danger">{{$errors->first('password')}}</div> @endif
            <input name="password" type="password" class="form-control @if ($errors->has('password')) is-invalid @endif alert-danger" placeholder="Password">     
          <br/><br/>
          <div class="remember-me--forget-password">
            <label>
              <input class="checkbox" type="checkbox" name="item" />
              <span class="text-checkbox">Remember me</span>
            </label>
            <p><a href="#" id="forgot-password" page="./ForgotPassword">Forgot your password?</a></p>
            <p><a href="register.html" id="register-link">Don't have an account?</a></p>
          </div>
          <button id="login-submit" type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
@endsection
