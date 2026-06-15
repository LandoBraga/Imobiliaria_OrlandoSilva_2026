<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'apartamento_id', 'data_venda', 'valor_venda', 'observacoes'];

    // Uma venda pertence a um cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Uma venda pertence a um apartamento
    public function apartamento()
    {
        return $this->belongsTo(Apartamento::class);
    }
}