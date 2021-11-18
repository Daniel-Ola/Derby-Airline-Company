<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StaffRoleSeeder::class,
            StaffSeeder::class,
            AirplaneSeeder::class,
            PilotRatingSeeder::class,
            PilotSeeder::class,
            FlightSeeder::class,
            PassengerSeeder::class,
            IntermediateCitySeeder::class,
            UserSeeder::class,
            CrewMemberSeeder::class
        ]);
    }
}
