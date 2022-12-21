<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tasks')->delete();
        
        \DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => '9806b16f-cd1c-4ae5-88b5-13c55b066293',
                'technology_id' => '9805269b-75d8-4c81-a89c-d7b9bf562697',
                'task_name' => 'Network Architecture Summary',
                'created_at' => '2022-12-20 14:05:41',
                'updated_at' => '2022-12-20 18:40:21',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '9806b181-3a60-4ae0-8d64-32ba226707d9',
                'technology_id' => '9805269b-75d8-4c81-a89c-d7b9bf562697',
                'task_name' => 'Network Engineering Assessment',
                'created_at' => '2022-12-20 14:05:52',
                'updated_at' => '2022-12-20 14:05:52',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '9806b18d-80c9-4e52-86bf-14886d606cba',
                'technology_id' => '9805269b-75d8-4c81-a89c-d7b9bf562697',
                'task_name' => 'A-Z Fibre/Transport Route Diversity',
                'created_at' => '2022-12-20 14:06:00',
                'updated_at' => '2022-12-20 14:06:00',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => '9806b198-91b5-407c-b958-25e67965c670',
                'technology_id' => '9805269b-75d8-4c81-a89c-d7b9bf562697',
                'task_name' => 'Common CO Structure',
                'created_at' => '2022-12-20 14:06:07',
                'updated_at' => '2022-12-20 14:06:07',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => '9806b1a3-132e-4b00-866c-678dea4e75c3',
                'technology_id' => '9805269b-75d8-4c81-a89c-d7b9bf562697',
                'task_name' => 'Logical Diversity',
                'created_at' => '2022-12-20 14:06:14',
                'updated_at' => '2022-12-20 14:06:14',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => '9806b1ae-3155-49a8-8659-6ede3b84e09e',
                'technology_id' => '9805269b-75d8-4c81-a89c-d7b9bf562697',
                'task_name' => 'Power Diversity',
                'created_at' => '2022-12-20 14:06:22',
                'updated_at' => '2022-12-20 14:06:22',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}