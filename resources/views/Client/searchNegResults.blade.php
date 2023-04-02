@extends('base')
@section('content')

<div class="row d-flex justify-content-center" style="margin-top: 25px;">
    <div class="text-center" style="margin-bottom: 300px;" > 
        <h5>The results of the search:</h5>
        @if ($message = Session::get('message'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
</div>
    
  </div>
      <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
      <script type="text/javascript" src="{{asset('js/categoriesSticky.js')}}"></script>
@endsection