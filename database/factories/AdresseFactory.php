<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adresse>
 */
class AdresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom_destinataire" => ucwords($this->faker->words(1, true)),
            "rue" => ucwords($this->faker->words(3, true)),
            "date_creation" => $this->faker->dateTime(),
            'ville_id' => $this->faker->numberBetween(1, 10),
            'code_postal_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
