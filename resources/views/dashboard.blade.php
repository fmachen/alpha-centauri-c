@extends('layouts.app')

@section('content')
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
@endsection