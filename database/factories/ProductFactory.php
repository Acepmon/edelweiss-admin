<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CommonCode;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = CommonCode::whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'C01')->inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();

        return [
            'product_title' => $this->faker->text(30),
            'product_status_cd' => $status->comm2_cd,
            'product_desc' => $this->faker->text(500),
            'product_sku' => $this->faker->ean8,
            'product_barcode' => $this->faker->isbn13,
            'product_stock' => $this->faker->randomNumber(2),
            'product_price' => $this->faker->randomNumber(6),

            'category_id' => $category->id,
            'tags' => null,
            'charge_tax' => $this->faker->boolean,
            'sell_out_of_stock' => $this->faker->boolean,
            'has_variants' => $this->faker->boolean,

            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
