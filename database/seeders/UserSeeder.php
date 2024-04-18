<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        if (!User::where('email', 'pauloandre2525@gmail.com')->first()) {
            $superAdmin = User::create([
                'name' => 'Paulo André',
                'email' => 'pauloandre2525@gmail.com',
                'password' => Hash::make('123')
            ]);

            // Atribuir papel para o usuário
            $superAdmin->assignRole('Super Admin');
        }

        if (!User::where('email', 'admin@gmail.com')->first()) {
            $admin = User::create([
                'name' => 'Administrador',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123')
            ]);

            // Atribuir papel para o usuário
            $admin->assignRole('Admin');
        }

        if (!User::where('email', 'financeiro@gmail.com')->first()) {
            $financeiro = User::create([
                'name' => 'Financeiro',
                'email' => 'financeiro@gmail.com',
                'password' => Hash::make('123')
            ]);

            // Atribuir papel para o usuário
            $financeiro->assignRole('Financeiro');
        }
    }
}
