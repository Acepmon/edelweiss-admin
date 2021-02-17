<?php

namespace Database\Seeders;

use App\Models\Draft;
use Illuminate\Database\Seeder;

class TestDraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Draft::factory()->count(50)->create();
    }
}
