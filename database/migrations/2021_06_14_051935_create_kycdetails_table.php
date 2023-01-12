<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKycdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kycdetails', function (Blueprint $table) {
            $table->id();
            $table->string("document_number")->unique();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("dob");
            $table->string("document_image");
            $table->string("document_type");
            $table->string("verification_status")->default(0);
            $table->string("userid");
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kycdetails');
    }
}
