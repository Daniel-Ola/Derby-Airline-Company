<?php

namespace Database\Factories;

use App\Models\Flight;
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
        $flight = Flight::inRandomOrder()->first()->flightnum;
        return [
            'flightnum' => $flight, // 'DERFLY' . $this->faker->unique()->numberBetween(100, 199),
            'city' => $this->faker->city,
            'arr_time' => Carbon::now(),
            'dep_time' => Carbon::now()->addHours($this->faker->numberBetween(2, 7))
        ];
    }
}
