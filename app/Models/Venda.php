<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Apartamento;

class Venda extends Model
{
    protected $fillable = [
        'cliente_id', 
        'apartamento_id', 
        'data_venda', 
        'valor_venda'
    ];

    // Relação: Uma venda pertence a um Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relação: Uma venda pertence a um Apartamento
    public function apartamento()
    {
        return $this->belongsTo(Apartamento::class);
    }
}