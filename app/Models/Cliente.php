<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- Garante esta linha!
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory; 

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'morada',
        'nif'
    ];

    // Adiciona esta relação aqui para o Laravel reconhecer o método vendas()
    public function vendas(): HasMany
    {
        return $this->hasMany(Venda::class);
    }
}