<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "date_commande" => $this->faker->dateTime(),
            "date_livraison" => $this->faker->dateTime(),
            "etat_paiement" => $this->faker->randomElement(['A', 'W', 'B']),
            "etat_livraison" => $this->faker->randomElement(['A', 'W', 'B']),
        ];
    }
}
