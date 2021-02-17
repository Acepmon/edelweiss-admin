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

            ['comm1_cd' => 'C01', 'comm2_cd' => '$$', 'comm2_nm' => 'Product Status'],
            ['comm1_cd' => 'C01', 'comm2_cd' => '10', 'comm2_nm' => 'Draft'],
            ['comm1_cd' => 'C01', 'comm2_cd' => '20', 'comm2_nm' => 'Active'],
            ['comm1_cd' => 'C01', 'comm2_cd' => '30', 'comm2_nm' => 'Archived'],

            ['comm1_cd' => 'D01', 'comm2_cd' => '$$', 'comm2_nm' => 'Order Status'],
            ['comm1_cd' => 'D01', 'comm2_cd' => '10', 'comm2_nm' => 'Open'],
            ['comm1_cd' => 'D01', 'comm2_cd' => '20', 'comm2_nm' => 'Archived'],
            ['comm1_cd' => 'D01', 'comm2_cd' => '30', 'comm2_nm' => 'Canceled'],

            ['comm1_cd' => 'D02', 'comm2_cd' => '$$', 'comm2_nm' => 'Payment Status'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '10', 'comm2_nm' => 'Authorized'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '20', 'comm2_nm' => 'Paid'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '30', 'comm2_nm' => 'Partially Refunded'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '30', 'comm2_nm' => 'Partially Paid'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '30', 'comm2_nm' => 'Pending'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '30', 'comm2_nm' => 'Refunded'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '30', 'comm2_nm' => 'Unpaid'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '30', 'comm2_nm' => 'Voided'],

            ['comm1_cd' => 'D03', 'comm2_cd' => '$$', 'comm2_nm' => 'Fulfillment Status'],
            ['comm1_cd' => 'D03', 'comm2_cd' => '10', 'comm2_nm' => 'Fulfilled'],
            ['comm1_cd' => 'D03', 'comm2_cd' => '20', 'comm2_nm' => 'Unfulfilled'],
            ['comm1_cd' => 'D03', 'comm2_cd' => '30', 'comm2_nm' => 'Partially Fulfilled'],
            ['comm1_cd' => 'D03', 'comm2_cd' => '30', 'comm2_nm' => 'Scheduled'],

            ['comm1_cd' => 'D04', 'comm2_cd' => '$$', 'comm2_nm' => 'Draft Status'],
            ['comm1_cd' => 'D04', 'comm2_cd' => '10', 'comm2_nm' => 'Open'],
            ['comm1_cd' => 'D04', 'comm2_cd' => '20', 'comm2_nm' => 'Invoice Sent'],
            ['comm1_cd' => 'D04', 'comm2_cd' => '30', 'comm2_nm' => 'Completed'],
        ]);
    }
}
