<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nourriture>
 */
class NourritureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ID_PRODUIT' => $this->faker->numberBetween(21, 40),
            'POIDS' => $this->faker->numberBetween(50, 250),
        ];
    }
}
