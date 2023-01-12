<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("username")->nullable();
            $table->string("email");
            $table->string("role")->nullable();
            $table->string("password");
            $table->string("bio")->nullable();
            $table->string("birthdate")->nullable();
            $table->string("website")->nullable();
            $table->string("phone")->nullable();
            $table->string("country")->nullable();
            $table->string("company")->nullable();
            $table->string("profile_img")->nullable();
            $table->string("work")->nullable();
            $table->string("publish_year")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->string("twitter")->nullable();
            $table->string("linkedin")->nullable();
            $table->string("youtube")->nullable();
            $table->string("whatsapp")->nullable();
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
        Schema::dropIfExists('admins');
    }
}
