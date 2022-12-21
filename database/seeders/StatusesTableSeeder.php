<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statuses')->delete();
        
        \DB::table('statuses')->insert(array (
            0 => 
            array (
                'id' => '9804daae-23d4-4940-97f2-59773328afae',
                'status_name' => 'Open',
                'color' => '#eab308',
                'created_at' => '2022-12-19 16:09:21',
                'updated_at' => '2022-12-19 16:09:21',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '9804dabf-36cc-4f91-8783-c2e395d8b622',
                'status_name' => 'In Progress',
                'color' => '#0ea5e9',
                'created_at' => '2022-12-19 16:09:32',
                'updated_at' => '2022-12-19 16:09:32',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '9804dace-9f64-430f-9a67-5c079078b2a5',
                'status_name' => 'Done',
                'color' => '#22c55e',
                'created_at' => '2022-12-19 16:09:42',
                'updated_at' => '2022-12-19 16:09:42',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => '9804dade-266c-49d8-8b11-09d2ef447b4f',
                'status_name' => 'To do',
                'color' => '#d946ef',
                'created_at' => '2022-12-19 16:09:52',
                'updated_at' => '2022-12-19 16:09:52',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => '9804daf4-6a72-4d97-8f44-4af959ddf76b',
                'status_name' => 'In Review',
                'color' => '#f97316',
                'created_at' => '2022-12-19 16:10:07',
                'updated_at' => '2022-12-19 16:10:07',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => '9804db06-e50b-4caa-a254-7000bb528a1d',
                'status_name' => 'Approved',
                'color' => '#8b5cf6',
                'created_at' => '2022-12-19 16:10:19',
                'updated_at' => '2022-12-19 16:10:19',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => '9804db16-762e-411a-ab6d-d8ce149e7ed5',
                'status_name' => 'Cancelled',
                'color' => '#ef4444',
                'created_at' => '2022-12-19 16:10:29',
                'updated_at' => '2022-12-19 17:20:07',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}