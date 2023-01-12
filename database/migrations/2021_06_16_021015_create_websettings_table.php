<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websettings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("website_name")->nullable();
            $table->string("website_url")->nullable();
            $table->string("website_tagline")->nullable();
            $table->string("website_keyword")->nullable();
            $table->text("website_desc")->nullable();
            $table->string("copyright")->nullable();
            $table->string("skin_mode")->nullable();
            $table->string("sideskin_mode")->nullable();
            $table->string("head_logo")->nullable();
            $table->string("footer_logo")->nullable();
            $table->string("favicon")->nullable();
            $table->string("facebook")->nullable();
            $table->string("youtube")->nullable();
            $table->string("twitter")->nullable();
            $table->string("whatsapp")->nullable();
            $table->string("linkedin")->nullable();
            $table->string("pinterest")->nullable();
            $table->string("instagram")->nullable();
            $table->string("github")->nullable();
            $table->string("pnum")->nullable();
            $table->string("secnum")->nullable();
            $table->string("pemail")->nullable();
            $table->string("secemail")->nullable();
            $table->string("address")->nullable();
            $table->string("about_title")->nullable();
            $table->string("about_slug")->nullable();
            $table->longText("about_desc")->nullable();
            $table->string("classic_rule")->nullable();
            $table->string("quick_rule")->nullable();
            $table->string("arrow_rule")->nullable();
            $table->string("commission")->nullable();
            $table->string("signup_bonus")->nullable();
            $table->string("bot_status")->nullable();
            $table->string("server_key")->nullable();
            $table->string("refer_bonus")->nullable();
            $table->string("min_withdraw")->nullable();
            $table->string("support_mail")->nullable();
            $table->string("payment_apikey")->nullable();
            $table->string("payment_secret")->nullable();
            $table->string("terms_title")->nullable();
            $table->string("terms_slug")->nullable();
            $table->longText("terms_desc")->nullable();
            $table->string("privacy_title")->nullable();
            $table->string("privacy_slug")->nullable();
            $table->longText("privacy_desc")->nullable();
            $table->string("whatsapp_link")->nullable();
            $table->string("youtube_link")->nullable();
            $table->string("purchase_link")->nullable();
            $table->string("app_version")->nullable();
            $table->string("telegram_link")->nullable();
            $table->longText("notification")->nullable();
            $table->string("refund_title")->nullable();
            $table->string("refund_slug")->nullable();
            $table->longText("refund_desc")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websettings');
    }
}
