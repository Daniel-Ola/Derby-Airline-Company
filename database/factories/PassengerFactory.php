<?php

namespace Database\Factories;

use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassengerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $flightnum = Flight::find(1)->first()->flightnum;
        return [
            'surname' => $this->faker->firstName,
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'date' => Carbon::now(),
            'flightnum' => $flightnum, // 'DERFLY' . $this->faker->unique()->numberBetween(100, 199),
        ];
    }
}
