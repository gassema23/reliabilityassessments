<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);
        $users = collect(User::all()->modelKeys());
        $data = [];
        for ($i = 0; $i < 50000; $i++) {
            $data[] = [
                'id'                  => $faker->unique()->uuid(),
                'planner_id'          => $users->random(),
                'prime_id'            => $users->random(),
                'project_no'          => 'P-'.$faker->unique()->randomNumber(7, true),
                'project_name'        => $faker->company,
                'project_description' => $faker->text(),
                'project_due_date'    => $faker->dateTimeBetween('+2 months', '+2 years'),
                'created_at'          => now()->toDateTimeString(),
                'updated_at'          => now()->toDateTimeString(),
            ];
        }

        $chunks = array_chunk($data, 5000);

        foreach ($chunks as $chunk) {
            Project::insert($chunk);
        }

//        Project::factory()->count(50000)->create();
    }
}
