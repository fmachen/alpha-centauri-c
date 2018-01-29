<?php

use Illuminate\Database\Seeder;

class SpaceshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('spaceships')->insert([
            "user_ref" => 1,
            "type_ref" => 1,
            "name" => "starter"
        ]);
    }
}
