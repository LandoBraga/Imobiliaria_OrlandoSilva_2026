<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'nome' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'telefone' => $this->faker->phoneNumber(),
        'morada' => $this->faker->address(),
        'nif' => $this->faker->unique()->numerify('#########'), // Gera 9 números aleatórios únicos
    ];
}
}
