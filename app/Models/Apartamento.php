<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    /**
     * Os atributos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'imagem_url',
        'referencia',
        'tipologia',
        'morada',
        'area',
        'preco',
        'fotografia',
        'estado',
    ];
}