<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spaceship extends Model
{
    protected $fillable = [
        'user_ref',
        'type_ref',
        'name'
    ];
}
