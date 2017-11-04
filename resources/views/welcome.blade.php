<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="top-left links">
        <p>
            Mark Molendijk
        </p>
    </div>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                @if (Auth::user()['admin'])
                    <a href="{{ url('/admin') }}">Admin panel</a>
                @else
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @endif
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                    @endauth
        </div>
    @endif
</nav>
<div class="jumbotron">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>My Games List</h1>
                <p>Login or sign up to manage your games!</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
