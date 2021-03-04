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
            ['id' => 1, 'name' => 'Preserved Flower'],
            ['id' => 2, 'name' => 'Flower Box'],
            ['id' => 3, 'name' => 'Bouqeut'],
            ['id' => 4, 'name' => 'Postcard'],
            ['id' => 5, 'name' => 'Gift'],
        ]);
    }
}
