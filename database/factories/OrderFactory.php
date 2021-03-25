<?php

namespace Database\Factories;

use App\Models\CommonCode;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $orderStatus = CommonCode::whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'D01')->inRandomOrder()->first();
        $paymentStatus = CommonCode::whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'D02')->inRandomOrder()->first();
        $fulfillmentStatus = CommonCode::whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'D03')->inRandomOrder()->first();
        $customer = Customer::inRandomOrder()->first();

        return [
            'total_amount' => $this->faker->randomNumber(4),
            'order_status_cd' => $orderStatus->comm2_cd,
            'payment_status_cd' => $paymentStatus->comm2_cd,
            'fulfillment_status_cd' => $fulfillmentStatus->comm2_cd,
            'customer_id' => $customer->id,
            'notes' => $this->faker->text(200),
            'tags' => null,

            'email' => $customer->email,
            'phone_number' => $customer->phone_number,

            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
