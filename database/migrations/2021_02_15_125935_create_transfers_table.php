<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('status'); // pending, partial, completed
            $table->string('expected_arrival')->nullable();
        });

        Schema::create('transfers_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_id');
            $table->unsignedBigInteger('product_id');

            $table->unsignedBigInteger('quantity')->default(0);
            $table->unsignedBigInteger('canceled')->default(0);
            $table->unsignedBigInteger('rejected')->default(0);
            $table->unsignedBigInteger('received')->default(0);
            $table->unsignedBigInteger('accepted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
        Schema::dropIfExists('transfers_products');
    }
}
