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
        $insuranceClass = App\InsuranceClass::where("value", env("MOTOR_PRIVATE", "600"))->first();
        $insuranceClass->categories()->saveMany([
            new App\Category([
                'name' => 'Comprehensive',
                'code' =>  env("MOTOR_PRIVATE_COMP", "COMP"),
            ]),
            new App\Category([
                'name' => 'Third Party Fire & Theft (TPFT)',
                'code' => env("MOTOR_PRIVATE_TPFT", "TPFT"),
            ]),
            new App\Category([
                'name' => 'Third Party Only (TPO)',
                'code' => env("MOTOR_PRIVATE_TPO", "TPO"),
            ]),
        ]);

        // 
        $optionalBenefitsClass = App\InsuranceClass::where("value", env("EXTRAS", "000"))->first();
        $optionalBenefitsClass->categories()->saveMany([
            new App\Category([
                'name' => 'Road Rescue',
                'code' => env("ROAD_RESCUE", "REC"),
            ]),
            new App\Category([
                'name' => 'Medical Evacuation',
                'code' => env("MEDICAL_EVAC", "MED"),
            ]),
            new App\Category([
                'name' => 'Security',
                'code' => env("SECURITY", "SEC"),
            ]),
        ]);
    }
}