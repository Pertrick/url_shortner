<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Url Shortner</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
      
      <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        
    <div class="container " style="width:60%; margin:150px auto 0 auto ;">
        <h1 class="text-center">Url Shortner</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                       <li>{{$error}}</li> 
                    @endforeach
                </ul>
            </div>
        @elseif(session('hash_link'))
            <h5 class="success text-center"">shortened url : 
            <a href="{{session('hash_link')}}">{{session('hash_link')}}</a>
            </h5> 
        @elseif(session('message'))
            <div class="alert alert-error">
                {{session('message')}}
        </div>                      
        @endif
        <form action="{{route('url.store')}}" method="post" class="m-2">
            @csrf
            <div style="display:flex; flex-direction:row">
                <div class="form-outline" style="width:80%; margin-right:5px;">
                    <input type="url" id="typeURL" class="form-control"  name="url"/>
                    <label class="form-label" for="typeURL">URL input</label>
                </div>
                <div>
                    <input type="submit" value="submit" class="btn btn-outline-success">
                </div>
            </div>
           
           
        </form>
    </div>

    </body>
</html>