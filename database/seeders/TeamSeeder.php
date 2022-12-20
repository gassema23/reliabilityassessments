<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamsArray = [
            [
                'team_name' => 'Manager' ,
                'created_at' => now() ,
            ] ,
            [
                'team_name' => 'Other' ,
                'created_at' => now() ,
            ] ,
            [
                'team_name' => 'Access / IP / Optical Planning' ,
                'created_at' => now() ,
            ] ,
            [
                'team_name' => 'Engineering Outside plan' ,
                'created_at' => now() ,
            ] ,
            [
                'team_name' => 'Engineering Inside Plan' ,
                'created_at' => now() ,
            ] ,
            [
                'team_name' => 'Space-Power Planning' ,
                'created_at' => now() ,
            ]
        ];
        foreach ($teamsArray as $team) {
            Team::create($team);
        }
    }
}
