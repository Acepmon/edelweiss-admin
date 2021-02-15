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

            $table->string('product_title');
            $table->string('product_status'); // draft, active, archived

            $table->string('product_desc')->nullable();
            $table->string('product_sku')->nullable();
            $table->string('product_barcode')->nullable();

            $table->bigInteger('product_stock')->default(0);
            $table->double('product_price', 10, 2)->default(0.00);

            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('tags')->nullable();

            $table->boolean('charge_tax')->default(false);
            $table->boolean('sell_out_of_stock')->default(false);
            $table->boolean('has_variants')->default(false);

            $table->timestamps();
        });

        Schema::create('products_seo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');

            $table->string('seo_title', 70)->nullable();
            $table->string('seo_desc', 320)->nullable();
            $table->string('seo_url', 250)->nullable();
        });

        Schema::create('products_variants', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('variant_id');

            $table->string('variant_type');
        });

        Schema::create('products_channels', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->string('channel_key');
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
        Schema::dropIfExists('products_seo');
        Schema::dropIfExists('products_variants');
        Schema::dropIfExists('products_channels');
    }
}
