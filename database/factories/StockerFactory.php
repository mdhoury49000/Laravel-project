<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stocker>
 */
class StockerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'ID_PRODUIT' => $this->faker->numberBetween(1, 40),
            'ID_BAR' => $this->faker->numberBetween(1, 2),
            'QUANTITESTOCK' => $this->faker->numberBetween(250, 500),
            'PRIX' => $this->faker->numberBetween(5, 15),
        ];
    }
}
