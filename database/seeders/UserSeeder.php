<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(150)->create();
        $role_id = Role::where('role_name', '=', 'Super-Admin')->first();
        $team_id = Team::where('team_name', '=', 'Engineering Inside Plan')->first();
        User::factory()->create([
            'f_name'      => 'Mathieu',
            'l_name'      => 'Gasse',
            'employe_id'  => 'T987679',
            'role_id'     => $role_id,
            'team_id'     => $team_id,
            'p_number'    => '4187491474',
            'email'       => 'admin@admin.com',
            'password'    => Hash::make('password'),
            'approved_at' => now()
        ]);
    }
}
