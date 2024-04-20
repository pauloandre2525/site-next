<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    // Indicar o Nome da Tabela
    protected $table = 'servico';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'status',
    ];
}
