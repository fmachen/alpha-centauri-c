@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Build your spaceship</h1>

        <div>
            <div class="spaceship" data-type="starter">
                <div class="slot" data-type="engine" data-size="2"></div>
                <div class="slot" data-type="cockpit" data-size="1"></div>
                <div class="slot" data-type="supply" data-size="0"></div>
                <div class="slot" data-type="" data-size="0"></div>
            </div>
        </div>
    </div>
@endsection
