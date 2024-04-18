<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'index-user',
            'show-user',
            'create-user',
            'edit-user',
            'destroy-user',

            'index-config',
            'show-config',
            'create-config',
            'edit-config',
            'destroy-config',

            'index-banner',
            'show-banner',
            'create-banner',
            'edit-banner',
            'destroy-banner',

            'index-role',
            'show-role',
            'create-role',
            'edit-role',
            'destroy-role',
        ];

        foreach($permissions as $permission){
            $existPermission = Permission::where('name', $permission)->first();

            if(!$existPermission){
                Permission::create(['name' => $permission, 'guard_name'=> 'web']);
            }
        }
    }
}
