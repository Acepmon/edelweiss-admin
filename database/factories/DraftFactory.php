<?php

namespace Database\Factories;

use App\Models\CommonCode;
use App\Models\Customer;
use App\Models\Draft;
use Illuminate\Database\Eloquent\Factories\Factory;

class DraftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Draft::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = CommonCode::whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'D04')->inRandomOrder()->first();
        $customer = Customer::inRandomOrder()->first();

        return [
            'total_amount' => $this->faker->randomNumber(4),
            'status_cd' => $status->comm2_cd,
            'customer_id' => $customer->id,
            'notes' => $this->faker->text(200),
            'tags' => null,

            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
