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
        $insurers = [
            [
                "name" => "Sanlam Insurance",
                "email" => "info@sanlam.co.ke",
                "logo" => "",
                "telephone" => "0700100200",
                "is_active" => true,
                "products" => [
                    [
                        "name" => "Sanlam Comprehensive Cover",
                        "category_code" => "COMP",
                        "class_code" => "601",
                        "tariffs" => [
                            [
                                "name" => "sum_insured_comp",
                                "value" => 3.25,
                                "is_active" => true,
                                "is_percentage" => true,
                            ]
                        ],
                        "benefits" => [
                            [
                                "name" => "Third party personal injury",
                                "limit" => "Kshs.3Million",
                                "is_optional" => false,
                            ],
                            [
                                "name" => "Third party property damage",
                                "limit" =>" Kshs. 5 Million"
                            ],
                            [
                                "name" => "Passenger legal liability",
                                "description" => "Any one person - Kshs. 3 Million:Any one event - Kshs. 20 Million"
                            ],
                            [
                                "name" => "Radio cassette",
                                "limit" => "Kshs. 30,000/="
                            ],
                            [
                                "name" => "Windscreen & window glass",
                                "limit" => "Upto Kshs. 30, 000/="
                            ],
                            [
                                "name" => "Medical expenses",
                                "limit" => "Kshs.30,000/="
                            ],
                            [
                                "name" => "Towing charges",
                                "limit" => "Kshs. 50,000/="
                            ],
                            [
                                "name" => "Repair Authority",
                                "limit" => "kshs. 50,000/="
                            ],
                            [
                                "name" => "Geographical",
                                "limit" => "Kenya"
                            ]
                        ]
                    ]
                ],
            ],
            [
                "name" => "First Assurance Company Limited",
                "email" => "hoinfo@firstassurance.co.ke",
                "logo" => "",
                "telephone" => "0202900000",
                "is_active" => true,
                "products" => [
                    [
                        "name" => "First Assurance Third party",
                        "category_code" => "TPO",
                        "class_code" => "601",
                        "tariffs" => [
                            [
                                "name" => "sum_insured_tp",
                                "value" => 7500,
                                "is_active" => true,
                                "is_percentage" => false,
                            ]
                        ],
                        "benefits" => [
                            [
                                "name" => "Third party only",
                                "limit" => "kshs. 7,500/= "
                            ],
                            [
                                "name" => "New & Young",
                                "limit" => "kshs 10,000/= additional"
                            ],
                            [
                                "name" => "Third party property damage",
                                "limit" => "kshs. 20,000,000/="
                            ],
                            [
                                "name" => "Passenger Legal Liability",
                                "limit" => "3M per person, 20M per event"
                            ]
                        ]
                    ],
                    [
                        "name" => "First Assurance Third Party Fire & Theft",
                        "category_code" => "TPFT",
                        "class_code" => "601",
                        "tariffs" => [
                           [
                                "name" => "sum_insured_tpft",
                                "value" => 3,
                                "is_active" => true,
                                "is_percentage" => true,
                           ]
                        ],
                        "benefits" => [
                            [
                                "name" => "Theft With Anti Theft Device",
                                "limit" => "Excess 10% of value Min Kshs. 20,000/-"
                            ],
                            [
                                "name" => "Theft Without Anti theft Device",
                                "limit" => "Excess 20% of value Min Kshs. 20,000/-"
                            ],
                            [
                                "name" => "Third party only",
                                "limit" => "Kshs. 7,500/= "
                            ],
                            [
                                "name" => "New & Young",
                                "limit" => "kshs 10,000/= additional"
                            ],
                            [
                                "name" => "Windscreen",
                                "limit" => "Kshs .30,000/-"
                            ],
                            [
                                "name" => "Radio Cassette",
                                "limit" => "Kshs. 30,000/-"
                            ],
                            [
                                "name" => "Third party property damage",
                                "limit" => "kshs. 20,000,000/-"
                            ],
                            [
                                "name" => "Passenger Legal Liability",
                                "limit" => "kshs. 3M per person, kshs. 20M per event"
                            ]
                        ]
                    ]
                ]
            ]
        ];

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

        foreach ($insurers as $in) {
            // Insurer
            $insurer = new App\Insurer;
            $insurer->name = $in["name"];
            $insurer->email = $in["email"];
            // $insurer->logo = "";
            $insurer->telephone = $in["telephone"];
            $insurer->is_active = true;

            $insurer->save();
            $insurer->refresh();

            $products = $in["products"];
            foreach ($products as $prod) {
                $category = App\Category::where('code', $prod["category_code"])->first();
                $class = App\InsuranceClass::where('value', $prod["class_code"])->first();

                // Product
                $product = new App\Product;
                $product->name = $prod["name"];
                $product->is_active = true;
                
                $product->insuranceClass()->associate($class);
                $product->category()->associate($category); 
                $product->insurer()->associate($insurer);

                $product->save();

                $tariffs = $prod["tariffs"];
                foreach ($tariffs as $tariff) {
                    $product->tariffs()->attach(App\Tariff::firstOrCreate($tariff));
                }
            }
        }
    }
}
