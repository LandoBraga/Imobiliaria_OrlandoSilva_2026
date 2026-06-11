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
        Schema::create('apartamentos', function (Blueprint $table) {
            $table->id(); // ID automático 
            $table->string('referencia')->unique(); // Referência única para pesquisa [cite: 17, 19]
            $table->string('tipologia'); // Ex: T0, T1, T2, T3 
            $table->string('morada'); // Morada do imóvel 
            $table->integer('area'); // Área em m² (número inteiro) 
            $table->decimal('preco', 12, 2); // Preço (ex: 250000.00) 
            $table->string('fotografia')->nullable(); // Caminho da foto no storage (opcional no início) [cite: 17, 55]
            $table->string('estado')->default('Disponível'); // Estado padrão: Disponível ou Vendido 
            $table->timestamps(); // Registos de criação e atualização automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartamentos');
    }
};