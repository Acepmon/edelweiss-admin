<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\CollectionSeo;
use App\Models\Product;
use Illuminate\Database\Seeder;

class TestCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::factory()->count(10)->create()->each(function ($collection) {
            CollectionSeo::factory()->state(['collection_id' => $collection->id])->create();

            $products = Product::inRandomOrder()->take(5)->pluck('id')->toArray();
            $collection->products()->attach($products);
        });
    }
}
