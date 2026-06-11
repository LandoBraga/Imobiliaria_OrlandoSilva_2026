<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Executa os seeders que criámos para preencher a base de dados
        $this->call([
            ClienteSeeder::class,
            ApartamentoSeeder::class,
        ]);
    }
}