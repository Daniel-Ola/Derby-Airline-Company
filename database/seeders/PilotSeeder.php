<?php

namespace Database\Seeders;

use App\Models\Pilot;
use Illuminate\Database\Seeder;

class PilotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pilot::factory()->count(20)->create();
    }
}
