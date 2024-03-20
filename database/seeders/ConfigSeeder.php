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
               Config::create([
                'titulo' => 'Título Site',
                'slogan' => 'descrição site',
                'telefone' => '(75) 99999-9999',
                'endereco' => 'Rua Tal'
            ]);
        }
    }