<?php

namespace Database\Seeders;

use App\Models\CommonCode;
use Illuminate\Database\Seeder;

class CommonCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommonCode::truncate();
        CommonCode::insert([
            ['comm1_cd' => 'A01', 'comm2_cd' => '$$', 'comm2_nm' => 'Administrator Roles'],
            ['comm1_cd' => 'A01', 'comm2_cd' => '10', 'comm2_nm' => 'Super Admin'],
            ['comm1_cd' => 'A01', 'comm2_cd' => '20', 'comm2_nm' => 'Operator'],

            ['comm1_cd' => 'B01', 'comm2_cd' => '$$', 'comm2_nm' => 'Page Type'],
            ['comm1_cd' => 'B01', 'comm2_cd' => '10', 'comm2_nm' => 'Normal Page'],
            ['comm1_cd' => 'B01', 'comm2_cd' => '20', 'comm2_nm' => 'Product Collection'],
        ]);
    }
}
