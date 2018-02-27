<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SpaceshipTypesTableSeeder::class);
        $this->call(SpaceshipsTableSeeder::class);
        $this->call(SpaceshipRoomsTableSeeder::class);
    }
}
