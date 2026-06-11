<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartamento;

class ApartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Apartamento::create([
        'referencia' => 'APT-001',
        'tipologia' => 'T2',
        'morada' => 'Rua Nova de Santa Cruz, Braga',
        'area' => 95,
        'preco' => 185000.00,
        'estado' => 'Disponível',
        'imagem_url' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=500&auto=format&fit=crop&q=60' // Apartamento Moderno
    ]);

    \App\Models\Apartamento::create([
        'referencia' => 'APT-002',
        'tipologia' => 'T1',
        'morada' => 'Rua do Souto, Braga',
        'area' => 65,
        'preco' => 140000.00,
        'estado' => 'Disponível',
        'imagem_url' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=500&auto=format&fit=crop&q=60' // Loft Urbano
    ]);

    \App\Models\Apartamento::create([
        'referencia' => 'APT-003',
        'tipologia' => 'T3',
        'morada' => 'Avenida Júlio Dinis, Porto',
        'area' => 140,
        'preco' => 295000.00,
        'estado' => 'Disponível',
        'imagem_url' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=500&auto=format&fit=crop&q=60' // Apartamento Luxo
    ]);

    \App\Models\Apartamento::create([
        'referencia' => 'APT-004',
        'tipologia' => 'T5',
        'morada' => 'Bom Jesus, Braga',
        'area' => 180,
        'preco' => 500000.00,
        'estado' => 'Disponível',
        'imagem_url' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=500&auto=format&fit=crop&q=60' // Penthouse Duplex
    ]);
}
}