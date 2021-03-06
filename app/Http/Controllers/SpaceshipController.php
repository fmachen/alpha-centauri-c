<?php

namespace App\Http\Controllers;

use App\Repository\SpaceshipRepository;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Input;

class SpaceshipController extends Controller
{
    /**
     * @var SpaceshipRepository
     */
    private $sr;
    /**
     * @var AuthManager
     */
    private $auth;

    public function __construct(SpaceshipRepository $sr, AuthManager $auth)
    {
        $this->sr = $sr;
        $this->auth = $auth;
    }

    public function index()
    {
        return view('spaceship/index', [
            'spaceships' => $this->sr->getSpaceships($this->auth->user()->id)
        ]);
    }

    public function build()
    {
        $selectedType = Input::get('ship_type');
        return view('spaceship/build', [
            'shipTypes' => \App\SpaceshipType::query()->select()->get(),
            'shipRooms' => \App\SpaceshipRoom::query()->select()->get(),
            'selectedType' => \App\SpaceshipType::query()->select()->where('id', '=', $selectedType)->first()
        ]);
    }

    public function show($shipName)
    {
        return view('spaceship/show', [
            'spaceship' => $this->sr->getSpaceship($this->auth->user()->id, $shipName)
        ]);
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
