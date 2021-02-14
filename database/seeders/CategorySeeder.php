<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Preserved Flower'],
            ['name' => 'Flower Box'],
            ['name' => 'Bouqeut'],
            ['name' => 'Postcard'],
            ['name' => 'Gift'],
        ]);
    }
}
