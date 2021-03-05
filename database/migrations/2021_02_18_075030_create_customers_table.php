<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('email');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('register')->nullable();
            $table->string('address')->nullable();
            $table->text('notes')->nullable();
            $table->string('tags')->nullable();

            $table->boolean('agreed_marketing_email')->default(false);
            $table->boolean('tax_exempt')->default(false);

            $table->string('subscription_status_cd')->default('10'); // A02
            $table->string('account_status_cd')->default('10'); // A03

            $table->timestamps();
        });

        Schema::create('customers_address', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->string('address_name');
            $table->string('address_status_cd')->default('10'); // A04

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
        Schema::dropIfExists('customers_address');
        Schema::dropIfExists('customers');
    }
}
