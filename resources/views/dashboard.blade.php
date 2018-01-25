@extends('layouts.app')

@section('content')
    <div class="panel panel--open">
        <div class="panel__header">
            <h2 class="panel__title">Dashboard</h2>
        </div>
        <div class="panel__content">
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
    </div>
@endsection
