<?php

namespace Database\Factories;

use App\Models\CommonCode;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductVariant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'variant_value' => $this->faker->text(5),
            'variant_sku' => $this->faker->ean8,
            'variant_barcode' => $this->faker->isbn13,
            'variant_quantity' => $this->faker->randomNumber(2),
            'variant_price' => $this->faker->randomNumber(3),
        ];
    }
}
