@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Spaceship show</h1>

            <div class="panel-body">
                Bienvenue sur le "{{ $spaceship->name }}" ! Le plus beau vaisseau de la galaxie :)
            </div>
        </div>
    </div>
@endsection
