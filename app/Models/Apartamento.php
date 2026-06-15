<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- Garante que esta linha existe!
use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    use HasFactory;
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