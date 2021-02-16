<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drafts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id');
            $table->double('total_amount', 10, 2);
            $table->string('status'); // open, invoice sent, completed
            $table->string('notes')->nullable();
            $table->string('tags')->nullable();

            $table->timestamps();
        });

        Schema::create('drafts_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('draft_id');
            $table->unsignedBigInteger('product_id');
            $table->bigInteger('quantity');
            $table->double('price', 10, 2);
        });

        Schema::create('drafts_shipping', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('draft_id');
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

        Schema::create('drafts_billing', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('draft_id');
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
        Schema::dropIfExists('drafts');
        Schema::dropIfExists('drafts_products');
        Schema::dropIfExists('drafts_shipping');
        Schema::dropIfExists('drafts_billing');
    }
}
