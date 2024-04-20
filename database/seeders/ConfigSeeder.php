<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        if (!Config::where('titulo', 'Título do Site')->first()) {
            Config::create([
                'titulo' => 'Título do Site',
                'slogan' => 'descrição site',
                'logo' => 'storage/logos/logo.png',
                'favicon' => 'storage/favicon.ico',
                'telefone' => '(75) 99999-9999',
                'endereco' => 'Rua Tal'
            ]);
        }
    }
}
