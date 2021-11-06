<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PilotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->unique(true);
        return [
            'empnum' => 'EMP' . $this->faker->unique()->numberBetween(100, 199),
            'pilot_rating_id' => $this->faker->numberBetween(1, 3)
        ];
    }
}
