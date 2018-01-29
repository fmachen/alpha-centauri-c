<?php

namespace App\Repository;

use App\Spaceship;
use Illuminate\Support\Facades\Auth;

class SpaceshipRepository
{
    /**
     * @var Spaceship
     */
    private $spaceship;

    public function __construct(Spaceship $spaceship)
    {

        $this->spaceship = $spaceship;
    }

    public function getSpaceships(int $userId)
    {
        return $this->spaceship->newQuery()
            ->select()
            ->where('user_ref', $userId)
            ->get();
    }

    public function getSpaceship(int $userId, $spaceshipName)
    {
        return $this->spaceship->newQuery()
            ->select()
            ->where('user_ref', $userId)
            ->where('name', $spaceshipName)
            ->get();
    }
}