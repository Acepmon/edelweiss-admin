<?php

namespace Database\Factories;

use App\Models\CollectionSeo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CollectionSeoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CollectionSeo::class;

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
            'seo_url' => url('/collections/' . Str::kebab($this->faker->text(70))),
        ];
    }
}
