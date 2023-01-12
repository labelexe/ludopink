<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("bit_amount")->nullable();
            $table->string("no_of_player")->nullable();
            $table->string("two_player_winning")->nullable();
            $table->string("no_of_winner")->nullable();
            $table->string("four_player_winning_1")->nullable();
            $table->string("four_player_winning_2")->nullable();
            $table->string("four_player_winning_3")->nullable();
            $table->string("tournament_interval")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
}
