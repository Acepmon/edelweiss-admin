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
        $variantType = CommonCode::whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'C02')->inRandomOrder()->first();

        return [
            'variant_type' => $variantType->comm2_cd,
            'variant_title' => $this->faker->text(10),
            'variant_sku' => $this->faker->ean8,
            'variant_stock' => $this->faker->randomNumber(2),
            'variant_price' => $this->faker->randomNumber(3),
        ];
    }
}
