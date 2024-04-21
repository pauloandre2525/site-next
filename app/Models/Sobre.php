<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sobre extends Model
{
    use HasFactory;

    // Indicar o Nome da Tabela
    protected $table = 'sobre';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = [
        'periodo',
        'titulo',
        'descricao',
        'imagem',
        'posicaoimagem',
        'status'
    ];
}
