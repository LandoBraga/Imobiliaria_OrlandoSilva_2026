<?php

namespace Database\Factories;

use App\Models\Apartamento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Apartamento>
 */
class ApartamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    // Lista de imagens reais e profissionais de apartamentos modernos
    $imagens = [
        'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=150&auto=format&fit=crop&q=80',
        'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=150&auto=format&fit=crop&q=80',
        'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=150&auto=format&fit=crop&q=80',
        'https://images.unsplash.com/photo-15 Insere02672086888-132e1b190d4f?w=150&auto=format&fit=crop&q=80',
        'https://images.unsplash.com/photo-1484154218962-a197022b5858?w=150&auto=format&fit=crop&q=80',
        'https://images.unsplash.com/photo-1513694203232-719a280e022f?w=150&auto=format&fit=crop&q=80',
        'https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=150&auto=format&fit=crop&q=80',
        'https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=150&auto=format&fit=crop&q=80',
    ];

    return [
        'referencia' => 'APT-' . $this->faker->unique()->numberBetween(1000, 9999),
        'tipologia' => $this->faker->randomElement(['T0', 'T1', 'T2', 'T3', 'T4']),
        'morada' => $this->faker->streetAddress(),
        'area' => $this->faker->numberBetween(50, 250),
        'preco' => $this->faker->randomFloat(2, 75000, 500000),
        'estado' => 'Disponível',
        // Seleciona uma foto aleatória da nossa lista profissional
        'imagem_url' => $this->faker->randomElement($imagens), 
    ];
}
}