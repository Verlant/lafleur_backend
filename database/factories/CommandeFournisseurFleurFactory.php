<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommandeFournisseurFleur>
 */
class CommandeFournisseurFleurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $testIds = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        return [
            "commande_fournisseur_id" => $this->faker->unique(true)->randomElement($testIds),
            "fleur_id" => $this->faker->unique(true)->randomElement($testIds),
            "quantite_achat" => $this->faker->randomNumber(3, false),
            "prix_achat" => $this->faker->randomFloat(2, 1, 9999.99),
        ];
    }
}
