<?php

namespace Database\Seeders;

use App\Models\CommonCode;
use App\Models\Product;
use App\Models\ProductSeo;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class TestProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(200)->create()->each(function ($product) {
            ProductSeo::factory()->state(['product_id' => $product->id])->create();

            if ($product->has_variants) {
                ProductVariant::factory()->count(10)->state([
                    'product_id' => $product->id
                ])->create();
            }
        });
    }
}
