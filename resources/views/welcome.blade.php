<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Games List</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light spacing-bottom">
    <a class="navbar-brand" href="#">Mark Molendijk</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        @if (Route::has('login'))
            <div class="navbar-nav">
                @auth
                    @if (Auth::user()['admin'])
                        <a class="nav-item nav-link" href="{{ url('/admin') }}">Admin panel</a>
                    @else
                        <a class="nav-item nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    @endif
                    @else
                        <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                        <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
                    @endauth
            </div>
        @endif
    </div>
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
