<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // Indicar o Nome da Tabela
    protected $table = 'banner';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = [
        'name',
        'legenda',
        'imagem',
        'status',
    ];
}
