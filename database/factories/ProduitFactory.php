<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "prix_vente" => $this->faker->randomFloat(2, 1, 999.99),
            "nom_produit" => ucwords($this->faker->words(1, true)),
            "date_creation" => $this->faker->dateTime(),
            "categorie_id" => $this->faker->numberBetween(1, 5),
            "type_produit_id" => $this->faker->numberBetween(1, 3),
        ];
    }
}
