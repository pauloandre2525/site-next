<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Role::where('name', 'Super Admin')->first()){
            Role::create([
                'name' => 'Super Admin'
            ]);
        }

        if (!Role::where('name', 'Admin')->first()) {
            $admin = Role::create([
                'name' => 'Admin'
            ]);

            $admin->givePermissionTo([
                'index-user',
                'show-user',
                'create-user',
                'edit-user',

                'index-config',
                'show-config',
                'edit-config',

                'index-banner',
                'show-banner',
                'create-banner',
                'edit-banner',

                'index-role',
                'show-role',
                'create-role',
                'edit-role',
            ]);
        }

        if (!Role::where('name', 'Financeiro')->first()) {
            $financeiro = Role::create([
                'name' => 'Financeiro'
            ]);

            $financeiro->givePermissionTo([
                'index-user',
                'show-user',

                'index-config',
                'show-config',

                'index-banner',
                'show-banner',

            ]);
        }
    }
}
