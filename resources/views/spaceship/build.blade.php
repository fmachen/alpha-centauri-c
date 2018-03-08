@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Build your spaceship</h1>

        <hr>

        {{ $shipTypes }}
        <br><br>
        {{ $shipRooms }}
        <br><br>
        {{ $selectedType }}

        <hr>

        <div class="flex">
            <div class="spaceship" data-type="starter">
                <div class="slot" data-type="engine" data-size="2"></div>
                <div class="slot" data-type="cockpit" data-size="1"></div>
                <div class="slot" data-type="supply" data-size="0"></div>
                <div class="slot" data-type="" data-size="0"></div>
            </div>
            <div class="prm plm">
                <form method="get">
                    <label for="ship_type">Ship type :</label>
                    <select name="ship_type" id="ship_type">
                        @foreach($shipTypes as $shipType)
                            <option value="{{ $shipType->id }}"
                                    @if($selectedType && $shipType->id == $selectedType->id) selected="selected"@endif
                            >
                                {{ $shipType->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="submit">
                </form>

                @if($selectedType)
                    <form method="post">
                        @for($i = 1; $i <= $selectedType->nb_rooms; $i++)
                            <label for="ship_type[{{ $i }}]">Room {{ $i }} :</label>
                            <select name="ship_type[{{ $i }}]" id="ship_type[{{ $i }}]">
                                @foreach($shipRooms as $shipRoom)
                                    <option value="{{ $shipRoom->id }}">{{ $shipRoom->name }}</option>
                                @endforeach
                            </select>
                        @endfor
                        {{ csrf_field() }}
                        <input type="submit">
                    </form>
                @endif

                <table class="spaceship__specification">
                    <thead>
                    <tr>
                        <td colspan="2">Specifications</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Cockpit</td>
                        <td>Level 1</td>
                    </tr>
                    <tr>
                        <td>Motor</td>
                        <td>Level 1</td>
                    </tr>
                    <tr>
                        <td>Supply</td>
                        <td>Level 1</td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td>20 Tons</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
