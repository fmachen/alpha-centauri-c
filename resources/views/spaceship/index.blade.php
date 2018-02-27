@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Spaceship list</h1>

                <ul>
                    @foreach($spaceships as $spaceship)
                        <li>
                            <a href="{{ route("spaceship.show", ["name"=>$spaceship->name]) }}">
                                {{ $spaceship->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
