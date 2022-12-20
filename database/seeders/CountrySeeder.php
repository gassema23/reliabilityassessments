<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'country_shortname' => 'CA',
                'country_name' => 'Canada',
                'phone_code' => '1',
            ],
            [
                'country_shortname' => 'US',
                'country_name' => 'United States',
                'phone_code' => '1',
            ],
            [
                'country_shortname' => 'UM',
                'country_name' => 'United States Minor Outlying Islands',
                'phone_code' => '1',
            ]
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
