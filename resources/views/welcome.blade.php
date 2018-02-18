<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alpha Centauri C</title>

    <!-- Fonts -->
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">
    {{--<link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,500,600,700" rel="stylesheet">--}}
</head>
<body>
<div class="homepage full-height">
    @if (Route::has('login'))
        <nav class="menu">
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
    @endif

    <div class="content">
        <h1 class="text-uppercase">
            Alpha Centauri C
        </h1>
        <div class="spaceOpening">
            <div class="planet"></div>
        </div>
    </div>
</div>
<script src="{{ asset('js/homepage.js') }}"></script>
</body>
</html>
