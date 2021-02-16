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

            $table->unsignedBigInteger('customer_id');
            $table->double('total_amount', 10, 2);
            $table->string('status'); // open, archived, canceled
            $table->string('payment_status'); // authorized, paid, partially refunded, partially paid, pending, refunded, unpaid, voided
            $table->string('fulfillment_status'); // fulfilled, unfulfilled, partially fulfilled, scheduled

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
        });

        Schema::create('orders_shipping', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('zip_code')->nullable();
        });

        Schema::create('orders_billing', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('zip_code')->nullable();
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
