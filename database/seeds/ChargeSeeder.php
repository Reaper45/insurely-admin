<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // All products have these charges
        $charges = [
            [
                "name" => 'training_levy',
                "value" => 0.20,
                "is_active" => true,
                "is_percentage" => true
            ],
            [
                "name" => 'IPCHF',
                "value" => 0.25,
                "is_active" => true,
                "is_percentage" => true
            ],
            [
                "name" => 'stamp_duty',
                "value" => 40,
                "is_active" => true,
                "is_percentage" => false
            ]
        ];
        DB::table('charges')->insert($charges);
    }
}
