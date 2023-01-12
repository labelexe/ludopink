<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamehistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamehistories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("playerid")->nullable();
            $table->string("status")->nullable();
            $table->string("bid_amount")->nullable();
            $table->string("Win_amount")->nullable();
            $table->string("loss_amount")->nullable();
            $table->string("seat_limit")->nullable();
            $table->string("oppo1")->nullable();
            $table->string("oppo2")->nullable();
            $table->string("oppo3")->nullable();
            $table->string("playername")->nullable();
            $table->string("finalamount")->nullable();
            $table->string("playtime")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gamehistories');
    }
}
