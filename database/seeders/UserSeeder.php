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
                'password' => Hash::make('123456a')
            ]);
        }
    }
}
