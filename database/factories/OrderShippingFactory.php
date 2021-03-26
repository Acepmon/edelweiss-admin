<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderShipping;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderShippingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderShipping::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $order = Order::inRandomOrder()->first();

        return [
            'order_id' => $order->id,
            'city' => $this->faker->text(10),
            'district' => $this->faker->text(10),
            'khoroo' => $this->faker->text(10),
            'address' => $this->faker->text(10),
            'zipcode' => rand(1000, 2000),
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
        ];
    }
}
