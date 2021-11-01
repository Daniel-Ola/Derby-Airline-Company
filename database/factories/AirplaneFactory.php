<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AirplaneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numser' => $this->faker->numberBetween(99999, 999999),
            'manufacturer' => $this->faker->firstName,
            'model_number' => $this->faker->numberBetween(99, 999)
        ];
    }
}
