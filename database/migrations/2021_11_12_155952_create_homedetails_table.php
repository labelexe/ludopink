<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homedetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText("heading")->nullable();
            $table->longText("subheading")->nullable();
            $table->longText("bannerimg")->nullable();
            $table->longText("about_title")->nullable();
            $table->longText("about_desc")->nullable();
            $table->longText("about_setp1")->nullable();
            $table->longText("about_step2")->nullable();
            $table->longText("about_step3")->nullable();
            $table->longText("about_img")->nullable();
            $table->longText("fe_title")->nullable();
            $table->longText("fe_desc")->nullable();
            $table->string("fetitle1")->nullable();
            $table->string("fedesc1")->nullable();
            $table->string("feicon1")->nullable();
            $table->string("fetitle2")->nullable();
            $table->string("fedesc2")->nullable();
            $table->string("feicon2")->nullable();
            $table->string("fetitle3")->nullable();
            $table->string("fedesc3")->nullable();
            $table->string("feicon3")->nullable();
            $table->string("fetitle4")->nullable();
            $table->string("fedesc4")->nullable();
            $table->string("feicon4")->nullable();
            $table->string("fetitle5")->nullable();
            $table->string("fedesc5")->nullable();
            $table->string("feicon5")->nullable();
            $table->string("fetitle6")->nullable();
            $table->string("fedesc6")->nullable();
            $table->string("feicon6")->nullable();
            $table->longText("download_title")->nullable();
            $table->longText("download_desc")->nullable();
            $table->longText("download_image")->nullable();
            $table->longText("download_link")->nullable();
            $table->longText("screenshot_title")->nullable();
            $table->longText("screenshot_desc")->nullable();
            $table->longText("contact_image")->nullable();
            $table->longText("contact_video")->nullable();
            $table->string("totalinstall")->nullable();
            $table->string("totaldownload")->nullable();
            $table->string("activeuser")->nullable();
            $table->string("satisfieduser")->nullable();
            $table->string("cardtitle1")->nullable();
            $table->string("carddescr1")->nullable();
            $table->string("cardicon1")->nullable();
            $table->string("cardtitle2")->nullable();
            $table->string("carddescr2")->nullable();
            $table->string("cardicon2")->nullable();
            $table->string("cardtitle3")->nullable();
            $table->string("carddescr3")->nullable();
            $table->string("cardicon3")->nullable();
            $table->string("cardtitle4")->nullable();
            $table->string("carddescr4")->nullable();
            $table->string("cardicon4")->nullable();
            $table->string("testimonial_title")->nullable();
            $table->string("testimonial_desc")->nullable();
            $table->string("contact_title")->nullable();
            $table->string("contact_desc")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homedetails');
    }
}
