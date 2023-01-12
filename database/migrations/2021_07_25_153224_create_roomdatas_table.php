<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomdatas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("roomID")->nullable();
            $table->string("title")->nullable();
            $table->string("creator")->nullable();
            $table->string("username")->nullable();
            $table->string("seat_limit")->nullable();
            $table->string("status")->nullable();
            $table->string("game_mode")->nullable();
            $table->string("stake_money")->nullable();
            $table->string("win_money")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomdatas');
    }
}
