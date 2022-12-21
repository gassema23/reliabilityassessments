<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Quebec',
                'state_shortname' => 'QC',
                'created_at' => '2022-12-19 17:21:29',
                'updated_at' => '2022-12-19 17:21:29',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '980934e7-aa0f-43e3-a43e-8f1c0673eaaa',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Alberta',
                'state_shortname' => 'AB',
                'created_at' => '2022-12-21 20:04:57',
                'updated_at' => '2022-12-21 20:04:57',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '98093500-1852-4266-9035-cca3900be97c',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'British Columbia',
                'state_shortname' => 'BC',
                'created_at' => '2022-12-21 20:05:13',
                'updated_at' => '2022-12-21 20:05:13',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => '98093540-56a4-473d-a63a-49cf9fe6468d',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Manitoba',
                'state_shortname' => 'MB',
                'created_at' => '2022-12-21 20:05:55',
                'updated_at' => '2022-12-21 20:05:55',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => '9809355a-c50e-44e3-80e0-4dc72a36e860',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'New Brunswick',
                'state_shortname' => 'NB',
                'created_at' => '2022-12-21 20:06:12',
                'updated_at' => '2022-12-21 20:06:12',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => '98093581-0ad2-486b-90de-de28b968fd7a',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Newfoundland and Labrador',
                'state_shortname' => 'NL',
                'created_at' => '2022-12-21 20:06:37',
                'updated_at' => '2022-12-21 20:06:37',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => '980935c3-121a-4a87-8f25-ffc595b23109',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Northwest Territories',
                'state_shortname' => 'NT',
                'created_at' => '2022-12-21 20:07:21',
                'updated_at' => '2022-12-21 20:07:21',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => '980935f1-7154-4c9a-9a5d-5537e56fca85',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Nova Scotia',
                'state_shortname' => 'NS',
                'created_at' => '2022-12-21 20:07:51',
                'updated_at' => '2022-12-21 20:07:51',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => '98093618-b400-4148-a004-14fd4d79613e',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Nunavut',
                'state_shortname' => 'NU',
                'created_at' => '2022-12-21 20:08:17',
                'updated_at' => '2022-12-21 20:08:17',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => '98093637-a2c0-459a-8d9b-dc6c46417de6',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Ontario',
                'state_shortname' => 'ON',
                'created_at' => '2022-12-21 20:08:37',
                'updated_at' => '2022-12-21 20:08:37',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => '98093660-3e6b-436d-86bd-5a08d67c7920',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Prince Edward Island',
                'state_shortname' => 'PEI',
                'created_at' => '2022-12-21 20:09:04',
                'updated_at' => '2022-12-21 20:09:04',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => '9809367e-7554-4745-a960-de14fc0d1ea2',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Saskatchewan',
                'state_shortname' => 'SK',
                'created_at' => '2022-12-21 20:09:23',
                'updated_at' => '2022-12-21 20:09:23',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => '98093694-8a18-456f-ac6a-b9848721a03a',
                'country_id' => '9804f460-490f-4df2-8510-4dce6f84b9b7',
                'state_name' => 'Yukon',
                'state_shortname' => 'YT',
                'created_at' => '2022-12-21 20:09:38',
                'updated_at' => '2022-12-21 20:09:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}