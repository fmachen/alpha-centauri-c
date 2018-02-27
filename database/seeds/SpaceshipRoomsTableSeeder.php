<?php

use Illuminate\Database\Seeder;

class SpaceshipRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('spaceship_rooms')->insert([
            "name" => "empty"
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_rooms')->insert([
            "name" => "engine I"
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_rooms')->insert([
            "name" => "engine II"
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_rooms')->insert([
            "name" => "engine III"
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_rooms')->insert([
            "name" => "cockpit I"
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_rooms')->insert([
            "name" => "cockpit II"
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_rooms')->insert([
            "name" => "cockpit III"
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_rooms')->insert([
            "name" => "stock I"
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_rooms')->insert([
            "name" => "stock II"
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_rooms')->insert([
            "name" => "stock III"
        ]);
    }
}
