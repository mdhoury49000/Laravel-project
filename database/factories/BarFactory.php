<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bar>
 */
class BarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ID_TYPE' => $this->faker->numberBetween(1, 3),
            'NOMBAR' => $this->faker->company(),
            'PHOTOBAR'=> $this->faker->imageUrl($width = 640, $height = 480),
            'OUVERTURE'=> $this->faker->time($format = 'H:i:s', $max = 'now'),
            'ADRESSE'=> $this->faker->streetAddress()
        ];
    }
}
