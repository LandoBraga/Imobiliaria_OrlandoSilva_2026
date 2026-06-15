<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Apartamento;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria 15 clientes fictícios na base de dados
        Cliente::factory(15)->create();

        // Cria 20 apartamentos fictícios na base de dados
        Apartamento::factory(20)->create();
    }
}