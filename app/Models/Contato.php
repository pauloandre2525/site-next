<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    // Definir a tabela se for diferente do plural do nome da classe
    protected $table = 'contato';

    // Definir quais campos podem ser preenchidos em massa
    protected $fillable = ['nome', 'email', 'telefone', 'texto'];
    
}
