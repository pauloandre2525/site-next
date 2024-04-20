<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portifolio extends Model
{
    use HasFactory;

    // Indicar o Nome da Tabela
    protected $table = 'portifolio';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = [
        'nome',
        'descricao',
        'imagem',
        'cliente',
        'categoria',
        'status'
    ];
}
