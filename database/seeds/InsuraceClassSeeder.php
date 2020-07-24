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
        //
        $classes = [
            [
                "name" => "Motor Private",
                "value" => "600"
            ],
        ];

        foreach ($classes as $class) {
            App\InsuranceClass::create($class);
        }
    }
}	