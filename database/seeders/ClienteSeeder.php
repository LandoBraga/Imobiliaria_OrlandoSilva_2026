<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome' => 'Rui Silva',
            'email' => 'rui.silva@email.com',
            'telefone' => '912345678',
            'morada' => 'Avenida Central, Braga',
            'nif' => '123456789'
        ]);

        Cliente::create([
            'nome' => 'Maria Santos',
            'email' => 'maria.santos@email.com',
            'telefone' => '934567890',
            'morada' => 'Rua de Cedofeita, Porto',
            'nif' => '234567890'
        ]);

        Cliente::create([
            'nome' => 'Ana Rodrigues',
            'email' => 'ana.rod@email.com',
            'telefone' => '967890123',
            'morada' => 'Avenida da Liberdade, Lisboa',
            'nif' => '345678901'
        ]);
    }
}