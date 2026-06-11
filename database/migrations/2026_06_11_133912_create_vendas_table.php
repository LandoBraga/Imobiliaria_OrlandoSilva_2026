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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id(); // ID da venda
            
            // Chaves Estrangeiras (Relações com as outras tabelas)
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('apartamento_id')->unique()->constrained('apartamentos')->onDelete('cascade'); 
            // O ->unique() garante que um apartamento só possa estar associado a uma única venda!

            $table->date('data_venda'); // Data da venda
            $table->decimal('valor_venda', 12, 2); // Valor real da venda
            $table->text('observacoes')->nullable(); // Observações (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};