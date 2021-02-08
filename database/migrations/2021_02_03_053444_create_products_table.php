<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_sku');
            $table->double('product_price')->default(0.00);
            $table->double('product_sale_price')->default(0.00);
            $table->integer('product_stock');

            $table->unsignedBigInteger('category_id');

            $table->boolean('is_stocked')->default(false);
            $table->boolean('is_multi_option')->default(false);
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
        Schema::dropIfExists('products');
    }
}
