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
    return [
        'referencia' => 'APT-' . $this->faker->unique()->numberBetween(1000, 9999),
        'tipologia' => $this->faker->randomElement(['T0', 'T1', 'T2', 'T3', 'T4']),
        'morada' => $this->faker->streetAddress(),
        'area' => $this->faker->numberBetween(45, 250), // Área em m²
        'preco' => $this->faker->randomFloat(2, 75000, 450000), // Preços realistas entre 75k e 450k
        'estado' => 'Disponível', // Todos começam disponíveis para podermos testar vendas depois
        'imagem_url' => null, // Deixamos nulo por agora, tratamos disso no upload real
    ];
}
}