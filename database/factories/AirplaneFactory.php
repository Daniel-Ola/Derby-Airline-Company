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
//        $this->faker->unique(true);
        return [
            'numser' => $this->faker->unique()->numberBetween(200, 300),
            'manufacturer' => $this->faker->firstName,
            'model_number' => $this->faker->numberBetween(100, 150)
        ];
    }
}
