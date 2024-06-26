<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    // Indicar o Nome da Tabela
    protected $table = 'equipe';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = [
        'nome',
        'funcao',
        'imagem',
        'whatsapp',
        'facebook',
        'instagram',
        'status'
    ];
}
