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
                "logo" => "sanlaam.jpg",
                "telephone" => "0700100200",
                "is_active" => true,
                "products" => [
                    [
                        "name" => "Sanlam Comprehensive Cover",
                        "category_code" => env("MOTOR_PRIVATE_COMP", "COMP"),
                        "class_code" => "601",
                        "description" => "",
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
                                ["name" => "Third party personal injury"],
                                [
                                    "limit" => "Kshs.3Million",
                                    "is_optional" => false
                                ]
                            ],
                            [
                                ["name" => "Third party property damage"],
                                ["limit" =>" Kshs. 5 Million"]
                            ],
                            [
                                ["name" => "Passenger legal liability"],
                                ["description" => "Any one person - Kshs. 3 Million:Any one event - Kshs. 20 Million"]
                            ],
                            [
                                ["name" => "Radio cassette"],
                                ["limit" => "Kshs. 30,000/="]
                            ],
                            [
                                ["name" => "Windscreen & window glass"],
                                ["limit" => "Upto Kshs. 30, 000/="]
                            ],
                            [
                                ["name" => "Medical expenses"],
                                ["limit" => "Kshs.30,000/="]
                            ],
                            [
                                ["name" => "Towing charges"],
                                ["limit" => "Kshs. 50,000/="]
                            ],
                            [
                                ["name" => "Repair Authority"],
                                ["limit" => "kshs. 50,000/="]
                            ],
                            [
                                ["name" => "Geographical"],
                                ["limit" => "Kenya"]
                            ],
                            // Optional
                            [
                                ["name" => "Excess protector", ],
                                [
                                    "is_optional" => true,
                                    "is_adjustable" => false,
                                ],
                                [
                                    // benefit tariff
                                    "name" => "excess_protector",
                                    "value" => 1700,
                                    "is_active" => true,
                                    "is_percentage" => false,
                                ]
                            ],
                            [
                                ["name" => "Political violence and terrorism"],
                                [
                                    "is_optional" => true,
                                    "is_adjustable" => false,
                                ],
                                [
                                    // benefit tariff
                                    "name" => "political_violence_and_terrorism",
                                    "value" => 1700,
                                    "is_active" => true,
                                    "is_percentage" => false,
                                ]
                            ]
                        ]
                    ]
                ],
            ],
            [
                "name" => "First Assurance Company Limited",
                "email" => "hoinfo@firstassurance.co.ke",
                "logo" => "first-assurance.jpg",
                "telephone" => "0202900000",
                "is_active" => true,
                "products" => [
                    [
                        "name" => "First Assurance Third party",
                        "category_code" => env("MOTOR_PRIVATE_TPO", "TPO"),
                        "class_code" => "601",
                        "description" => "",
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
                                ["name" => "Third party only"],
                                ["limit" => "kshs. 7,500/= "]
                            ],
                            [
                                ["name" => "New & Young"],
                                ["limit" => "kshs 10,000/= additional"]
                            ],
                            [
                                ["name" => "Third party property damage"],
                                ["limit" => "kshs. 20,000,000/="]
                            ],
                            [
                                ["name" => "Passenger Legal Liability"],
                                ["limit" => "3M per person, 20M per event"]
                            ]
                        ]
                    ],
                    [
                        "name" => "First Assurance Third Party Fire & Theft",
                        "category_code" => env("MOTOR_PRIVATE_TPFT", "TPFT"),
                        "class_code" => "601",
                        "description" => "",
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
                                ["name" => "Theft With Anti Theft Device"],
                                ["limit" => "Excess 10% of value Min Kshs. 20,000/-"]
                            ],
                            [
                                ["name" => "Theft Without Anti theft Device"],
                                ["limit" => "Excess 20% of value Min Kshs. 20,000/-"]
                            ],
                            [
                                ["name" => "Third party only"],
                                ["limit" => "Kshs. 7,500/= "]
                            ],
                            [
                                ["name" => "New & Young"],
                                ["limit" => "kshs 10,000/= additional"]
                            ],
                            [
                                ["name" => "Windscreen"],
                                ["limit" => "Kshs .30,000/-"]
                            ],
                            [
                                ["name" => "Radio Cassette"],
                                ["limit" => "Kshs. 30,000/-"]
                            ],
                            [
                                ["name" => "Third party property damage"],
                                ["limit" => "kshs. 20,000,000/-"]
                            ],
                            [
                                ["name" => "Passenger Legal Liability"],
                                ["limit" => "kshs. 3M per person, kshs. 20M per event"]
                            ]
                        ]
                    ]
                ]
            ],
            [
                "name" => "AA Kenya",
                "email" => "aak@aakenya.co.ke",
                "logo" => "aa.png",
                "telephone" => "0709 933 000",
                "is_active" => true,
                "products" => [
                    [
                        "name" => "Towing & recovery (Road rescue)",
                        "description" => "Get Towing and Recovery services from AA Kenya.",
                        "category_code" => env("ROAD_RESCUE", "REC"),
                        "class_code" => env("EXTRAS", "000"), // Optional benefits class
                        "is_optional_benefit" => true, // Use to avoid attaching charges
                        "tariffs" => [
                            [
                                "name" => "aa_towing_and_recovering",
                                "value" => 6500,
                                "is_active" => true,
                                "is_percentage" => false,
                            ]
                        ],
                        "benefits" => [
                            [
                                ["name" => "Road rescue"],
                                ["description" => "Get Towing and Recovery services from AA Kenya"],
                            ],
                        ]
                    ]
                ]
            ]
        ];

        foreach ($insurers as $in) {
            // Insurer
            $insurer = new App\Insurer;
            $insurer->name = $in["name"];
            $insurer->email = $in["email"];
            $insurer->logo = $in["logo"];
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
                $product->description = $prod["description"];
                // $product->has_ipf = $prod["has_ipf"];
                $product->is_active = true;
                
                $product->insuranceClass()->associate($class);
                $product->category()->associate($category); 
                $product->insurer()->associate($insurer);

                $product->save();

                // Benefits
                $benefits = $prod["benefits"];
                foreach ($benefits as $benefit) {
                    $created_benefit = App\Benefit::firstOrCreate($benefit[0], $benefit[1]);

                    if(array_key_exists(2, $benefit)) {
                        $benefit_tar = App\Tariff::create($benefit[2]);
                        $created_benefit->tariffs()->attach($benefit_tar);
                    }
                    $product->benefits()->attach($created_benefit);
                }

                if (!$product->is_optional_benefit) {
                    // Charges (Training Levy, Stamp duty & IPCHF)
                    $charges = App\Charge::all();
                    foreach($charges as $charge) {
                        $product->charges()->attach($charge);
                    }
                }

                $tariffs = $prod["tariffs"];
                foreach ($tariffs as $tariff) {
                    $product->tariffs()->attach(App\Tariff::firstOrCreate($tariff));
                }
            }
        }
    }
}
