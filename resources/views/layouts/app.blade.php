<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,500,600,700" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="ultimateWrapper">
    @guest
        <div class="flex justify-content-around pts">
            <div><a href="{{ route('login') }}">Login</a></div>
            <div><a href="{{ route('register') }}">Register</a></div>
        </div>
    @else
        <div class="panel">
            <div class="panel__header">
                <div class="panel__tab">
                    <i class="icon"><img src="/icon/astronaut.svg" alt="Account"></i>
                </div>
                <h2 class="panel__title">Account</h2>
            </div>
            <div class="panel__content">
                <ul>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                           aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    @endguest
    @auth
        <div class="panel">
            <div class="panel__header">
                <h2 class="panel__title">Spaceship</h2>
            </div>
            <div class="panel__content">
                <a href="{{ route('spaceship.list') }}">list</a>
                <a href="{{ route('spaceship.new') }}">new</a>
                <a href="{{ route('spaceship.show', 0) }}">show</a>
                <a href="{{ route('spaceship.build', 0) }}">build</a>
                <a href="{{ route('spaceship.crew', 0) }}">crew</a>
                <a href="{{ route('spaceship.map', 0) }}">map</a>
                <a href="{{ route('spaceship.jump', 0) }}">jump</a>
            </div>
        </div>
    @endauth

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
