<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PilotRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rating' => $this->faker->numberBetween(0, 5),
            'airplane_id' => $this->faker->numberBetween(1, 100)
        ];
    }
}
