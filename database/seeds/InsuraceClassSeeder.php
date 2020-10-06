<?php

use Illuminate\Database\Seeder;

class InsuranceClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Motor Insurance classes
        $parent = App\InsuranceClass::create([
            "name" => "Motor Private",
            "value" =>  env("MOTOR_PRIVATE", "600")
        ]);
        $parent->children()->saveMany([
            new App\InsuranceClass([
                "name" => "Personal use only (Private)",
                "value" => "601"
            ]),
            new App\InsuranceClass([
                "name" => "Commercial vehicle for carrying own goods",
                "value" => "602"
            ]),
            new App\InsuranceClass([
                "name" => "PSV vehicle (Taxi driven by me & my driver)",
                "value" => "603"
            ]),
            new App\InsuranceClass([
                "name" => "General cartage for carrying commercial goods",
                "value" => "604"
            ]),
        ]);

        // Optional Benefits class [hack]
        $optional_benefit = new App\InsuranceClass([
            "name" => "Extra products",
            "value" =>  env("EXTRAS", "000")
        ]);
        $optional_benefit->save();
    }
}	