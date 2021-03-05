<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->double('total_amount', 10, 2);
            $table->string('order_status_cd'); // open, archived, canceled
            $table->string('payment_status_cd'); // authorized, paid, partially refunded, partially paid, pending, refunded, unpaid, voided
            $table->string('fulfillment_status_cd'); // fulfilled, unfulfilled, partially fulfilled, scheduled
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('invoice_no')->nullable();

            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('notes')->nullable();
            $table->string('tags')->nullable();

            $table->timestamps();
        });

        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->bigInteger('quantity');
            $table->double('price', 10, 2);
            $table->double('total', 10, 2);
        });

        Schema::create('orders_shipping', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('khoroo')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
        });

        Schema::create('orders_billing', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('khoroo')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('orders_products');
        Schema::dropIfExists('orders_shipping');
        Schema::dropIfExists('orders_billing');
    }
}
