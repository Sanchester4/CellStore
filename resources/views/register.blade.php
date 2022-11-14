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
        <form action="{{route('register')}}" method="post">
            @csrf
          <div class="inputs">
            <input name="name" type="text" class="form-control" placeholder="Full Name" value="">
            <br/>
            @if ($errors->has('email'))
            <div class="alert alert-danger">{{$errors->first('email')}}</div> @endif
            <input name="email" type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" placeholder="Email" value="{{old('email')}}">
            <br/>
            @if ($errors->has('password'))
            <div class="alert alert-danger">{{$errors->first('password')}}</div> @endif
            <input name="password" type="password" class="form-control @if ($errors->has('password')) is-invalid @endif alert-danger" placeholder="Password">     
          <br/><br/>
          <button id="login-submit" type="submit" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
@endsection
