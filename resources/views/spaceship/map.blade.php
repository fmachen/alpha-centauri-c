@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Spaceship map</h1>
        <div class="map">
            <div class="zone zone--white" style="top: 50%; left: 33%;"></div>
            <div class="zone zone--blue zone--current" style="top: 30%; left: 52%;"></div>
            <div class="zone zone--red" style="top: 70%; left: 72%;"></div>
        </div>
    </div>
@endsection
