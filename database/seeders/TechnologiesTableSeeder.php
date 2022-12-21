<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('technologies')->delete();
        
        \DB::table('technologies')->insert(array (
            0 => 
            array (
                'id' => '9805266d-f0d1-41e5-ac8b-8e111f7041cf',
                'technology_name' => 'Transport',
                'created_at' => '2022-12-19 19:41:09',
                'updated_at' => '2022-12-19 19:41:09',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '9805269b-75d8-4c81-a89c-d7b9bf562697',
                'technology_name' => 'Planning & Engineering',
                'created_at' => '2022-12-19 19:41:39',
                'updated_at' => '2022-12-19 19:41:39',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}