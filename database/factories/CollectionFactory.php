<?php

namespace Database\Factories;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Collection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'coll_title' => $this->faker->text(70),
            'coll_image' => $this->faker->imageUrl(),
            'coll_desc' => $this->faker->text(200),
        ];
    }
}
