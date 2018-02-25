@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Build your spaceship</h1>
        <div class="flex">
            <div class="spaceship" data-type="starter">
                <div class="slot" data-type="engine" data-size="2"></div>
                <div class="slot" data-type="cockpit" data-size="1"></div>
                <div class="slot" data-type="supply" data-size="0"></div>
                <div class="slot" data-type="" data-size="0"></div>
            </div>
            <div class="prm plm">
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
