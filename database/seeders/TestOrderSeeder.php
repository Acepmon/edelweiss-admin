<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\OrderProduct;
use App\Models\OrderShipping;
use Illuminate\Database\Seeder;

class TestOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()->count(50)->create()->each(function (Order $order) {
            OrderProduct::factory()->state([
                'order_id' => $order->id,
            ])->count(rand(1,3))->create();

            OrderShipping::factory()->state([
                'order_id' => $order->id,
            ])->create();

            OrderBilling::factory()->state([
                'order_id' => $order->id,
            ])->create();
        });
    }
}
