<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ventilation>
 */
class VentilationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "livreur_id" => rand(1, 5),
            "code" => fake()->swiftBicNumber(),
            "date_ventilation" => fake()->date(),
            "ventile" => fake()->numberBetween(100, 5000),
            "non_ventile" => fake()->numberBetween(50, 200),
            "retour" => fake()->numberBetween(10, 200),
            "pu" => '165',
            "location" => rand(5000, 25000),
            "montant_verse" => fake()->numberBetween(10000, 50000),
            "qte_vendue" => fake()->numberBetween(100, 5000),
            "montant_a_verse" => fake()->numberBetween(10000, 50000),
            "reliquat" => fake()->numberBetween(10000, 50000),
            "status" => fake()->randomElement(['Actif', 'Archiver'])
        ];
    }
}
