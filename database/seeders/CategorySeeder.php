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
            ['id' => 1, 'name' => 'Preserved Flower', 'image' => asset('static/images/category/preserved-flower.jpg')],
            ['id' => 2, 'name' => 'Flower Box', 'image' => asset('static/images/category/flower-box.jpg')],
            ['id' => 3, 'name' => 'Bouqeut', 'image' => asset('static/images/category/bouqeut.jpg')],
            ['id' => 4, 'name' => 'Postcard', 'image' => asset('static/images/category/postcard.jpg')],
            ['id' => 5, 'name' => 'Gift', 'image' => asset('static/images/category/gift.jpg')],
        ]);
    }
}
