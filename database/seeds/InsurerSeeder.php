<?php

use Illuminate\Database\Seeder;

class InsurerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $insurers = [
            [
                "name" => "Sanlam Insurance",
                "email" => "info@sanlam.co.ke",
                "logo" => "",
                "telephone" => "0700100200",
                "is_active" => true
            ],
            [
                "name" => "First Assurance Company Limited",
                "email" => "hoinfo@firstassurance.co.ke",
                "logo" => "",
                "telephone" => "0202900000",
                "is_active" => true
            ]
        ];
        
        foreach ($insurers as $insurer) {
            App\Insurer::create($insurer);
        }
    }
}
