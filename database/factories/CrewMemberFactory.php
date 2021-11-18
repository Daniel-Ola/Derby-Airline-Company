<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CrewMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empnum' => 'EMP000115',
            'flightnum' => 'DERFLY144',
            'assignment' => 'FLight Attendant'
        ];
    }
}
