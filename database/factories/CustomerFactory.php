<?php

namespace Database\Factories;

use App\Models\CommonCode;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subscriptionStatus = CommonCode::whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'A02')->inRandomOrder()->first();
        $accountStatus = CommonCode::whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', 'A03')->inRandomOrder()->first();

        return [
            'email' => $this->faker->email,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->e164PhoneNumber,
            'notes' => $this->faker->text(100),
            'tags' => null,
            'agreed_marketing_email' => $this->faker->boolean,
            'tax_exempt' => $this->faker->boolean,
            'subscription_status_cd' => $subscriptionStatus->comm2_cd,
            'account_status_cd' => $accountStatus->comm2_cd,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
