<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loterie>
 */
class LoterieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom_lot" => ucwords($this->faker->words(1, true)),
            "quantite_lot" => $this->faker->randomNumber(4, false)
        ];
    }
}
