<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaceshipController extends Controller
{
    public function index()
    {
        return view('spaceship/index');
    }

    public function build()
    {
        return view('spaceship/build');
    }

    public function show($shipName)
    {
        return view('spaceship/show');
    }

    public function crew($shipName)
    {
        return view('spaceship/crew');
    }

    public function map($shipName)
    {
        return view('spaceship/map');
    }

    public function jump($shipName)
    {
        return view('spaceship/jump');
    }
}
