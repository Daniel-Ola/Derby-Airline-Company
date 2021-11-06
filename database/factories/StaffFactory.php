<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
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
            'empnum' => 'EMP' . $this->faker->unique()->numberBetween(100, 199),
            'surname' => $this->faker->lastName,
            'name' => $this->faker->firstName,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'salary' => $this->faker->randomFloat(),
            'staff_role_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
