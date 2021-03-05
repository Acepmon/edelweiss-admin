<?php

namespace Database\Seeders;

use App\Models\InvoiceSetting;
use Illuminate\Database\Seeder;

class InvoiceSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvoiceSetting::create([
            'prefix' => 'INV-',
            'number_sequence' => '000001',
            'sequence_character' => 6,
            'tax_org_register' => '623223'
        ]);
    }
}
