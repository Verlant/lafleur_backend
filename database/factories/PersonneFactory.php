<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personne>
 */
class PersonneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom_personne" => ucwords($this->faker->words(1, true)),
            "prenom_personne" => ucwords($this->faker->words(1, true)),
            "email" => $this->faker->unique()->safeEmail(),
            "tel" => $this->faker->numerify('06########'),
            "date_creation" => $this->faker->dateTime(),
        ];
    }
}
