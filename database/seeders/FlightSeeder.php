<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Flight::factory()->count(50)->state([
            new Sequence(
                ['status' => 'waiting'],
                ['status' => 'in-progress'],
                ['status' => 'completed'],
            )
        ])->create();
//        for ($i = 1; $i <= 100; $i++) {
//            $num = $i;
//            if ($i < 10)
//                $num = '00' . $i;
//            if ($i > 9 && $i < 100)
//                $num = '0' . $i;
//            Flight::create([
//                'flightnum' => 'DERFLY' . $num,
//                'origin' => $faker->city,
//                'dest' => $faker->city,
//                'airplane_id' => $faker->numberBetween(1, 100),
//                'pilot_id' => $faker->numberBetween(1, 20)
//            ]);
//        }
    }
}
