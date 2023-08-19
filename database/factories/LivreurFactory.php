<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livreur>
 */
class LivreurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "prenom" => fake()->firstName(),
            "nom" => fake()->lastName(),
            "structure_id" => rand(1, 3),
            "matricule" => fake()->swiftBicNumber(),
            "telephone" => fake()->phoneNumber(),
            "adresse" => fake()->address(),
            "typePiece" => rand(0, 1),
            "numeroPiece" => fake()->creditCardNumber(),
            "photo" => fake()->imageUrl('60', '60'),
            "status" => fake()->randomElement(['Actif', 'Inactif'])
        ];
    }
}
