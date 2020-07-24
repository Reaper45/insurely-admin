<?php

use App\InsuranceClass;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $insuranceClass = App\InsuranceClass::where("value", "600")->first();
        $insuranceClass->categories()->saveMany([
            new App\Category([
                'name'=>'Comprehensive',
                'code' => 'COMP',
            ]),
            new App\Category([
                'name'=>'Third Party Fire & Theft (TPFT)',
                'code' => 'TPFT',
            ]),
            new App\Category([
                'name'=>'Third Party Only (TPO)',
                'code' => 'TPO',
            ]),
            new App\Category([
                'name'=>'Road Rescue',
                'code' => 'REC',
            ]),
            new App\Category([
                'name'=>'Medical Evacuation',
                'code' => 'MED',
            ]),
            new App\Category([
                'name'=>'Security',
                'code' => 'SEC',
            ]),
        ]);
    }
}