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
    {{--<link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,500,600,700" rel="stylesheet">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="ultimateWrapper" id="app">
    <div class="container">
        @guest
            <nav class="menu">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </nav>
        @else

            <panel :title="'Account'">
                <i class="icon" slot="icon">@include('svg.astronaut')</i>
                <div slot="content">
                    <ul>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"
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
            </panel>
        @endguest
        @auth
            <panel :title="'Spaceship'">
                <i class="icon" slot="icon">@include('svg.rocket')</i>
                <div slot="content">
                    <ul class="panel__links">
                        <a href="{{ route('spaceship.list') }}">list</a>
                        <a href="{{ route('spaceship.new') }}">new</a>
                        <a href="{{ route('spaceship.show', 0) }}">show</a>
                        <a href="{{ route('spaceship.build', 0) }}">build</a>
                        <a href="{{ route('spaceship.crew', 0) }}">crew</a>
                        <a href="{{ route('spaceship.map', 0) }}">map</a>
                        <a href="{{ route('spaceship.jump', 0) }}">jump</a>
                    </ul>
                </div>
            </panel>
            <panel :title="'Dashboard'">
                <i class="icon" slot="icon">@include('svg.dashboard')</i>
                <div slot="content">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="mbs">Here is your last report :</p>
                    <table class="report">
                        <tr>
                            <td>Iron</td>
                            <td>202 T</td>
                        </tr>
                        <tr>
                            <td>Water</td>
                            <td>300 m<sup>3</sup></td>
                        </tr>
                    </table>
                </div>
            </panel>
        @endauth
    </div>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
