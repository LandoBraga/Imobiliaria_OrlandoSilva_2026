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
            $table->id();
            $table->string('referencia')->unique();
            $table->string('tipologia');
            $table->string('morada');
            $table->integer('area');
            $table->decimal('preco', 10, 2);
            $table->string('estado')->default('Disponível');
            $table->string('imagem_url')->nullable(); // Coluna das fotos alinhada aqui
            $table->timestamps();
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