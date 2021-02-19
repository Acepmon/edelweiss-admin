<?php

namespace Database\Factories;

use App\Models\ProductSeo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductSeoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductSeo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seo_title' => $this->faker->text(70),
            'seo_desc' => $this->faker->text(320),
            'seo_url' => url('/products/' . Str::kebab($this->faker->text(70))),
        ];
    }
}
