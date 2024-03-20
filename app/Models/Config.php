<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    // Indicar o Nome da Tabela
    protected $table = 'config';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = [
        'titulo',
        'slogan',
        'telefone',
        'endereco',
    ];
}
