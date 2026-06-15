<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'morada', 'nif'];

    // Um cliente tem muitas vendas
    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}