<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'channel_key' => 'web',
            'channel_name' => 'Edelweiss Online Shop',
            'is_disabled' => false,
        ]);
    }
}
