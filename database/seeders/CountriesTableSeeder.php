<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'country_shortname' => 'CA',
                'country_name' => 'Canada',
                'phone_code' => '1',
                'created_at' => '2022-12-19 17:21:12',
                'updated_at' => '2022-12-19 17:21:12',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '98093429-bed5-4182-b956-79f647d3110c',
                'country_shortname' => 'US',
                'country_name' => 'United States',
                'phone_code' => '1',
                'created_at' => '2022-12-21 20:02:52',
                'updated_at' => '2022-12-21 20:02:52',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}