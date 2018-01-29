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
            "id" => 1,
            "name" => "starter"
        ]);
    }
}
