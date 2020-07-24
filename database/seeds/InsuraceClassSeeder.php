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
            "value" => "600"
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
    }
}	