<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    // Indicar o Nome da Tabela
    protected $table = 'blog';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = [
        'titulo',
        'slug',
        'resumo',
        'imagem',
        'conteudo',
        'editor',
    ];

    //criar slug
    public static function boot()
    {
        parent::boot();

        static::saving(function ($blog) {
            $blog->slug = Str::slug($blog->titulo);
        });
    }
}
