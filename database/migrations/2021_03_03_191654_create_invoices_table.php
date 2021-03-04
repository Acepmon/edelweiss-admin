<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prefix')->default('');
            $table->string('number_sequence')->default('000001');
            $table->string('tax_org_register')->nullable();

            // The association
            $table->timestamps();
        });

        Schema::create('invoices_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('account_bank_code'); // P04
            $table->string('account_number', 100);
            $table->string('account_name', 100);
            $table->string('account_currency'); // P03
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->string('invoice_no')->primary();
            $table->string('invoice_code'); // config('services.qpay.invoice_code')
            $table->string('invoice_id')->nullable(); // qpay invoice id
            $table->string('invoice_receiver_code'); // customer id
            $table->string('invoice_description');
            $table->timestamp('invoice_due_date')->nullable();
            $table->timestamp('expiry_date')->nullable();

            $table->double('amount');
            $table->text('note')->nullable();

            // Settings
            $table->boolean('calculate_vat')->default(false);
            $table->boolean('enable_expiry')->default(false);
            $table->boolean('allow_partial')->default(false);
            $table->boolean('allow_exceed')->default(false);

            // QR Code
            $table->string('qr_text')->nullable();
            $table->text('qr_image')->nullable();

            $table->timestamps();
        });

        Schema::create('invoices_lines', function (Blueprint $table) {
            $table->string('invoice_no');

            $table->integer('line_seq')->default(1);
            $table->string('line_description', 255);
            $table->double('line_quantity');
            $table->double('line_unit_price');

            $table->string('tax_product_code', 45)->nullable();
            $table->string('product_code', 45); // product id

            $table->string('note', 255)->nullable();
        });

        Schema::create('invoices_lines_discounts', function (Blueprint $table) {
            $table->string('invoice_no');
            $table->integer('line_seq');
            $table->integer('discount_seq')->default(1);
            $table->string('discount_code')->nullable();
            $table->string('description', 100);
            $table->double('amount');
            $table->string('note', 255)->nullable();
        });

        Schema::create('invoices_lines_surcharges', function (Blueprint $table) {
            $table->string('invoice_no');
            $table->integer('line_seq');
            $table->integer('surcharge_seq')->default(1);
            $table->string('surcharge_code')->nullable();
            $table->string('description', 100);
            $table->double('amount');
            $table->string('note', 255)->nullable();
        });

        Schema::create('invoices_lines_taxes', function (Blueprint $table) {
            $table->string('invoice_no');
            $table->integer('line_seq');
            $table->integer('tax_seq')->default(1);
            $table->string('tax_code')->nullable(); // P05
            $table->string('description', 100);
            $table->double('amount');
            $table->double('city_tax');
            $table->string('note', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices_settings');
        Schema::dropIfExists('invoices_accounts');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('invoices_lines');
        Schema::dropIfExists('invoices_lines_discounts');
        Schema::dropIfExists('invoices_lines_surcharges');
        Schema::dropIfExists('invoices_lines_taxes');
    }
}
