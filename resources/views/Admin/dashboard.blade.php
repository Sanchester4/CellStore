<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    </head>
    <body>
        <div class="main-block" style="margin-left: 200px;">
            <form action="/addPhone" method="post">
              @csrf
              <h1>Add Phone</h1>
              @if ($message = Session::get('message'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
              @endif
                <div class="info"> <input class="fname" type="text" name="name" placeholder="Phone Name"/> 
                <div class="info"> <input class="fname" type="text" name="price" placeholder="Price"/> 
                <div class="info"> <input class="fname" type="text" name="color" placeholder="Color"/> 
                <div class="info"> <input class="fname" type="text" name="tempUrl" placeholder="Url"/>
                <div class="info"> <input class="fname" type="text" name="factory" placeholder="Produced By"/> 
                <div class="info"> <input class="fname" type="text" name="prodYear" placeholder="Production Year"/> 
                <div class="info"> <input class="fname" type="text" name="ramSize" placeholder="RAM Size"/> 
                <div class="info"> <input class="fname" type="text" name="romSize" placeholder="ROM Size"/> 
                <div class="info"> <input class="fname" type="text" name="mainCamera" placeholder="Main Camera Px"/> 
                <div class="info"> <input class="fname" type="text" name="secondCamera" placeholder="Second Camera PX"/> 
                {{-- <div class="info"> <input class="fname" type="text" name="id" placeholder="ID"/>  --}}
                <br>
                <textarea type="text" name="description" placeholder="Description"></textarea>
              </div>
              <button class="add-student-button" type="submit">
                Submit
              </button>
            </form>
          </div>

        {{-- <script type="text/javascript" src="{{asset('js/app.js')}}"></script> --}}
    </body>
</html>