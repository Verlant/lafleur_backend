<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fleur>
 */
class FleurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom_fleur" => ucwords($this->faker->words(1, true)),
            "date_inventaire" => now(),
            "quantite_stock" => $this->faker->randomNumber(4, false),
            "unite_id" => $this->faker->numberBetween(1, 3),
            "couleur_id" => $this->faker->numberBetween(1, 9),
        ];
    }
}
