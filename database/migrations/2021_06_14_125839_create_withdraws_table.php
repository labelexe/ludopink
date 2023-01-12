<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->string("userid");
            $table->string("amount");
            $table->string("payment_method");
            $table->string("wallet_number")->nullable();
            $table->string("bank_name")->nullable();
            $table->string("account_number")->nullable();
            $table->string("ifsc_code")->nullable();
            $table->string("withdrawstatus")->default(0);
            $table->string("transaction_id")->nullable();
            $table->timestamp("created_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraws');
    }
}
