<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // ID automático (Chave Primária)
            $table->string('nome'); // Nome do cliente
            $table->string('email')->unique(); // Email único (obrigatório)
            $table->string('telefone')->nullable(); // Telefone (opcional)
            $table->string('morada'); // Morada
            $table->string('nif', 9)->unique(); // NIF com 9 dígitos e único
            $table->timestamps(); // Cria as colunas created_at e updated_at automaticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};