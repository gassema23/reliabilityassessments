<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'planner_id'          => User::inRandomOrder()->first(),
            'prime_id'            => User::inRandomOrder()->first(),
            'project_no'          => 'P-'.fake()->unique()->randomNumber(7, true),
            'project_name'        => fake()->company,
            'project_description' => fake()->text(),
            'project_due_date'    => fake()->dateTimeBetween('+2 months', '+2 years'),
            'created_at'          => fake()->dateTimeBetween('-2 years', '2 months'),
            'updated_at'          => fake()->dateTimeBetween('-2 years', '2 months'),
        ];
    }
}
