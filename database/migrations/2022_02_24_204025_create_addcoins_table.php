<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddcoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addcoins', function (Blueprint $table) {
            $table->id();
            $table->string("playerid")->nullable();
            $table->string("image")->nullable();
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("coin")->nullable();
            $table->string("status")->nullable();
            $table->string("trans_date")->nullable();
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
        Schema::dropIfExists('addcoins');
    }
}
