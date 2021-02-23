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
        // A - Account related
        // B - Channels related
        // C - Product related
        // D - Order related

        CommonCode::truncate();
        CommonCode::insert([
            ['comm1_cd' => 'A01', 'comm2_cd' => '$$', 'comm2_nm' => 'Administrator Roles'],
            ['comm1_cd' => 'A01', 'comm2_cd' => '10', 'comm2_nm' => 'Super Admin'],
            ['comm1_cd' => 'A01', 'comm2_cd' => '20', 'comm2_nm' => 'Operator'],

            ['comm1_cd' => 'A02', 'comm2_cd' => '$$', 'comm2_nm' => 'Subscription Status'],
            ['comm1_cd' => 'A02', 'comm2_cd' => '10', 'comm2_nm' => 'Not Subscribed'],
            ['comm1_cd' => 'A02', 'comm2_cd' => '20', 'comm2_nm' => 'Pending Confirmation'],
            ['comm1_cd' => 'A02', 'comm2_cd' => '30', 'comm2_nm' => 'Subscribed'],

            ['comm1_cd' => 'A03', 'comm2_cd' => '$$', 'comm2_nm' => 'Account Status'],
            ['comm1_cd' => 'A03', 'comm2_cd' => '10', 'comm2_nm' => 'Active'],
            ['comm1_cd' => 'A03', 'comm2_cd' => '20', 'comm2_nm' => 'Disabled'],
            ['comm1_cd' => 'A03', 'comm2_cd' => '30', 'comm2_nm' => 'Invited to Create Account'],
            ['comm1_cd' => 'A03', 'comm2_cd' => '40', 'comm2_nm' => 'Declined Account Invitation'],

            ['comm1_cd' => 'B01', 'comm2_cd' => '$$', 'comm2_nm' => 'Page Type'],
            ['comm1_cd' => 'B01', 'comm2_cd' => '10', 'comm2_nm' => 'Normal Page'],
            ['comm1_cd' => 'B01', 'comm2_cd' => '20', 'comm2_nm' => 'Product Collection'],

            ['comm1_cd' => 'B02', 'comm2_cd' => '$$', 'comm2_nm' => 'Page Status'],
            ['comm1_cd' => 'B02', 'comm2_cd' => '10', 'comm2_nm' => 'Draft'],
            ['comm1_cd' => 'B02', 'comm2_cd' => '20', 'comm2_nm' => 'Active'],

            ['comm1_cd' => 'B03', 'comm2_cd' => '$$', 'comm2_nm' => 'Menu Status'],
            ['comm1_cd' => 'B03', 'comm2_cd' => '10', 'comm2_nm' => 'Draft'],
            ['comm1_cd' => 'B03', 'comm2_cd' => '20', 'comm2_nm' => 'Active'],

            ['comm1_cd' => 'C01', 'comm2_cd' => '$$', 'comm2_nm' => 'Product Status'],
            ['comm1_cd' => 'C01', 'comm2_cd' => '10', 'comm2_nm' => 'Draft'],
            ['comm1_cd' => 'C01', 'comm2_cd' => '20', 'comm2_nm' => 'Active'],
            ['comm1_cd' => 'C01', 'comm2_cd' => '30', 'comm2_nm' => 'Archived'],

            ['comm1_cd' => 'C02', 'comm2_cd' => '$$', 'comm2_nm' => 'Product Variants'],
            ['comm1_cd' => 'C02', 'comm2_cd' => 'size', 'comm2_nm' => 'Size'],
            ['comm1_cd' => 'C02', 'comm2_cd' => 'color', 'comm2_nm' => 'Color'],
            ['comm1_cd' => 'C02', 'comm2_cd' => 'material', 'comm2_nm' => 'Material'],
            ['comm1_cd' => 'C02', 'comm2_cd' => 'style', 'comm2_nm' => 'Style'],

            ['comm1_cd' => 'D01', 'comm2_cd' => '$$', 'comm2_nm' => 'Order Status'],
            ['comm1_cd' => 'D01', 'comm2_cd' => '10', 'comm2_nm' => 'Open'],
            ['comm1_cd' => 'D01', 'comm2_cd' => '20', 'comm2_nm' => 'Archived'],
            ['comm1_cd' => 'D01', 'comm2_cd' => '30', 'comm2_nm' => 'Canceled'],

            ['comm1_cd' => 'D02', 'comm2_cd' => '$$', 'comm2_nm' => 'Payment Status'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '10', 'comm2_nm' => 'Authorized'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '20', 'comm2_nm' => 'Paid'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '30', 'comm2_nm' => 'Partially Refunded'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '40', 'comm2_nm' => 'Partially Paid'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '50', 'comm2_nm' => 'Pending'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '60', 'comm2_nm' => 'Refunded'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '70', 'comm2_nm' => 'Unpaid'],
            ['comm1_cd' => 'D02', 'comm2_cd' => '80', 'comm2_nm' => 'Voided'],

            ['comm1_cd' => 'D03', 'comm2_cd' => '$$', 'comm2_nm' => 'Fulfillment Status'],
            ['comm1_cd' => 'D03', 'comm2_cd' => '10', 'comm2_nm' => 'Fulfilled'],
            ['comm1_cd' => 'D03', 'comm2_cd' => '20', 'comm2_nm' => 'Unfulfilled'],
            ['comm1_cd' => 'D03', 'comm2_cd' => '30', 'comm2_nm' => 'Partially Fulfilled'],
            ['comm1_cd' => 'D03', 'comm2_cd' => '40', 'comm2_nm' => 'Scheduled'],

            ['comm1_cd' => 'D04', 'comm2_cd' => '$$', 'comm2_nm' => 'Draft Status'],
            ['comm1_cd' => 'D04', 'comm2_cd' => '10', 'comm2_nm' => 'Open'],
            ['comm1_cd' => 'D04', 'comm2_cd' => '20', 'comm2_nm' => 'Invoice Sent'],
            ['comm1_cd' => 'D04', 'comm2_cd' => '30', 'comm2_nm' => 'Completed'],
        ]);
    }
}
