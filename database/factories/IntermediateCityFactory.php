<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class IntermediateCityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'flightnum' => 'DERFLY' . 999,
            'city' => $this->faker->city,
            'arr_time' => Carbon::now(),
            'dep_time' => Carbon::now()
        ];
    }
}
