<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('common_codes', function (Blueprint $table) {
            $table->string('comm1_cd', 100);
            $table->string('comm2_cd', 100);
            $table->string('comm2_nm', 250);

            $table->index(['comm1_cd', 'comm2_cd']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('common_codes');
    }
}
