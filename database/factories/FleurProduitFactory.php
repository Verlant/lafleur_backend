<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FleurProduit>
 */
class FleurProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "quantite_fleur" => $this->faker->randomNumber(2, false),
            "categorie_id" => $this->faker->numberBetween(1, 10),
            "type_produit_id" => $this->faker->numberBetween(1, 10),
        ];
    }
}
