<?php

namespace Database\Seeders;

use App\Models\PilotRating;
use Illuminate\Database\Seeder;

class PilotRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PilotRating::factory()->count(3)->create();
    }
}
