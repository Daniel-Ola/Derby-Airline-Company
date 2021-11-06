<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
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
            'flightnum' => 'DERFLY' . $this->faker->unique()->numberBetween(100, 199), //->numberBetween(401, 999),
            'origin' => $this->faker->city,
            'dest' => $this->faker->city,
            'airplane_id' => $this->faker->numberBetween(1, 100),
            'pilot_id' => $this->faker->numberBetween(1, 20)
        ];
    }
}
