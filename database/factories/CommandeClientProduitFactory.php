<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommandeClientProduit>
 */
class CommandeClientProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "produit_id" => $this->faker->unique()->numberBetween(1, 10),
            "commande_client_id" => $this->faker->unique()->numberBetween(1, 10),
            "quantite_vente" => $this->faker->randomNumber(3, false)
        ];
    }
}
