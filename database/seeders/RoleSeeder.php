<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleArray = [
            [
                'role_name' => 'Super-Admin'
            ] ,
            [
                'role_name' => 'Admin'
            ] ,
            [
                'role_name' => 'Manager'
            ] ,
            [
                'role_name' => 'Editor'
            ] ,
            [
                'role_name' => 'Guest'
            ]
        ];
        foreach ($roleArray as $role) {
            Role::create($role);
        }
    }
}
