<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom_client" => ucwords($this->faker->words(1, true)),
            "prenom_client" => ucwords($this->faker->words(1, true)),
            "email" => $this->faker->unique()->safeEmail(),
            "mdp" => Hash::make($this->faker->password()),
            "tel" => $this->faker->numerify('06########'),
            "date_creation" => $this->faker->dateTime(),
            "adresse_id" => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
