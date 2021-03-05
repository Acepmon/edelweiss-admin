<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->string('invoice_no');

            $table->string('payment_id')->primary();
            $table->string('payment_status'); // P01
            $table->timestamp('payment_date');
            $table->double('trx_fee');
            $table->double('payment_amount');
            $table->string('payment_currency'); // P03
            $table->string('payment_wallet');
            $table->string('payment_type'); // P02
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
