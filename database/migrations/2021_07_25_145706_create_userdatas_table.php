<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdatas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("userid")->nullable();
            $table->string("playerid")->nullable();
            $table->string("username")->nullable();
            $table->string("userphone")->nullable();
            $table->string("password")->nullable();
            $table->string("OTPCode")->nullable();
            $table->string("useremail")->nullable();
            $table->string("photo")->nullable();
            $table->string("refer_code")->nullable();
            $table->string("used_refer_code")->nullable();
            $table->string("totalgem")->nullable();
            $table->string("totalcoin")->nullable();
            $table->string("playcoin")->nullable();
            $table->string("wincoin")->nullable();
            $table->string("device_token")->nullable();
            $table->string("registerDate")->nullable();
            $table->string("refrelCoin")->nullable();
            $table->string("GamePlayed")->default('0');
            $table->string("twoPlayWin")->default('0');
            $table->string("FourPlayWin")->default('0');
            $table->string("twoPlayloss")->default('0');
            $table->string("FourPlayloss")->default('0');
            $table->string("status")->nullable();
            $table->string("banned")->nullable();
            $table->string("accountHolder")->nullable();
            $table->string("accountNumber")->nullable();
            $table->string("ifsc")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userdatas');
    }
}
