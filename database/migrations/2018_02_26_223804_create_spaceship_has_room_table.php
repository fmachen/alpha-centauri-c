<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaceshipHasRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaceship_has_room', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spaceship_ref')->unsigned();
            $table->integer('spaceship_room_ref')->unsigned();
            $table->integer('spaceship_room_number')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spaceship_has_room');
    }
}
