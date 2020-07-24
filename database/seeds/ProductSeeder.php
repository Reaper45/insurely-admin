<?php

use Illuminate\Database\Seeder;

// Hydrate the products
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "name" => "Sanlam Comprehensive Cover",
                "is_active" => true,
            ],
            [
                "name" => "First Assurance Third party",
                "is_active" => true,
            ],
            [
                "name" => "First Assurance Third Party Fire & Theft",
                "is_active" => true,
            ],
        ];
        // Insurer
        $insurer = new App\Insurer;
        $insurer->name = "Sanlam Insurance";
        $insurer->email = "info@sanlam.co.ke";
        $insurer->logo = "";
        $insurer->telephone = "0700100200";
        $insurer->is_active = true;

        $insurer->save();
        $insurer->refresh();

        $category = App\Category::where('code', 'COMP')->first();
        $class = App\InsuranceClass::where('value', '600')->first();

        // Product
        $product = new App\Product;
        $product->name = "Sanlam Comprehensive Cover";
        $product->is_active = true;
        
        $product->insuranceClass()->associate($class);
        $product->category()->associate($category); 
        $product->insurer()->associate($insurer);

        // $category->products()->

        // $product->save();
        // $product->refresh();

        // Tariff
        // $tariff = new App\Tariff;
        // $tariff->name = "sum_insured_comp";
        // $tariff->value = 3.25;
        // $tariff->is_active = true;
        // $tariff->is_percentage = true;

        // $tariff->save();
        // $tariff->refresh();
        $product->save();

        $product->tariffs()->attach(App\Tariff::firstOrCreate([
            "name" => "sum_insured_comp",
            "value" => 3.25,
            "is_active" => true,
            "is_percentage" => true,
        ]));

    }
}
