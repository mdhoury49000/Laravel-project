<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boisson>
 */
class BoissonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ID_PRODUIT' => $this->faker->numberBetween(10, 20),
            'ESTALCOOLISE' => $this->faker->numberBetween(1, 1),
            'DEGREALCOOL' => $this->faker->numberBetween(6, 20),
            'VOLUME' => $this->faker->numberBetween(12.5, 25),
        ];
    }
}
