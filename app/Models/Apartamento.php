<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    use HasFactory;

    protected $fillable = ['referencia', 'tipologia', 'morada', 'area', 'preco', 'estado', 'imagem_url'];

    // Um apartamento tem uma venda (relação 1-para-1)
    public function venda()
    {
        return $this->hasOne(Venda::class);
    }
}