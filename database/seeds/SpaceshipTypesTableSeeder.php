<?php

use Illuminate\Database\Seeder;

class SpaceshipTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('spaceship_types')->insert([
            "name" => "Starter",
            "nb_rooms" => 4
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_types')->insert([
            "name" => "Battleship",
            "nb_rooms" => 4
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_types')->insert([
            "name" => "Cargo ship",
            "nb_rooms" => 4
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_types')->insert([
            "name" => "Spacecruiser",
            "nb_rooms" => 4
        ]);
        \Illuminate\Support\Facades\DB::table('spaceship_types')->insert([
            "name" => "Scout ship",
            "nb_rooms" => 4
        ]);
    }
}
