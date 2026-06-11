<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartamento;

class ApartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apartamento::create([
            'referencia' => 'APT-001',
            'tipologia' => 'T2',
            'morada' => 'Rua Nova de Santa Cruz, Braga',
            'area' => 95,
            'preco' => 185000.00,
            'fotografia' => null,
            'estado' => 'Disponível'
        ]);

        Apartamento::create([
            'referencia' => 'APT-002',
            'tipologia' => 'T1',
            'morada' => 'Rua do Souto, Braga',
            'area' => 65,
            'preco' => 140000.00,
            'fotografia' => null,
            'estado' => 'Disponível'
        ]);

        Apartamento::create([
            'referencia' => 'APT-003',
            'tipologia' => 'T3',
            'morada' => 'Avenida Júlio Dinis, Porto',
            'area' => 140,
            'preco' => 295000.00,
            'fotografia' => null,
            'estado' => 'Disponível'
        ]);
    }
}