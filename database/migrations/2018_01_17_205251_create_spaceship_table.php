<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaceshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaceship', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_ref');
            $table->foreign('user_ref', 'user')->references('id')->on('users');
            $table->unsignedInteger('type_ref');
            $table->foreign('type_ref', 'type')->references('id')->on('spaceship_type');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spaceship');
    }
}
