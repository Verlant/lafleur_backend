<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommandeClient>
 */
class CommandeClientFactory extends Factory
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
            "commande_id" => $this->faker->unique()->randomElement($testIds),
            "loterie_id" => $this->faker->numberBetween(1, 5),
            "client_personne_id" => $this->faker->numberBetween(1, 10),
            "adresse_livraison_id" => $this->faker->numberBetween(1, 10),
            "frais_livraison" => $this->faker->randomFloat(2, 1, 4.99),
        ];
    }
}
