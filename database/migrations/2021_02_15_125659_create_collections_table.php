<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            
            $table->string('coll_title');
            $table->string('coll_image')->nullable();
            $table->text('coll_desc')->nullable();
        });

        Schema::create('collections_seo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collection_id');

            $table->string('seo_title', 70)->nullable();
            $table->string('seo_desc', 320)->nullable();
            $table->string('seo_url', 250)->nullable();
        });

        Schema::create('collections_channels', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('collection_id');
            $table->string('channel_key');
        });

        Schema::create('collections_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('collection_id');
            $table->unsignedBigInteger('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
        Schema::dropIfExists('collections_seo');
        Schema::dropIfExists('collections_channels');
        Schema::dropIfExists('collections_products');
    }
}
