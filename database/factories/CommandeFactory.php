<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

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
            "date_commande" => now(),
            "date_livraison" => now()->addDays($this->faker->numberBetween(1, 5)),
            "etat_paiement" => $this->faker->randomElement(['A', 'W', 'B']),
            "etat_livraison" => $this->faker->randomElement(['A', 'W', 'B']),
            "frais_livraison" => $this->faker->boolean(),
            "client_id" => $this->faker->numberBetween(1, 10),
            "loterie_id" => $this->faker->numberBetween(1, 5),
        ];
    }
}
