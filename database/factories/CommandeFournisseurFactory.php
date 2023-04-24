<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommandeFournisseur>
 */
class CommandeFournisseurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "commande_id" => $this->faker->unique()->numberBetween(1, 10),
            "fournisseur_personne_id" => $this->faker->numberBetween(1, 10)
        ];
    }
}
