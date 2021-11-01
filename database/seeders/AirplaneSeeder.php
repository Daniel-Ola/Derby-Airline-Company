<?php

namespace Database\Seeders;

use App\Models\Airplane;
use Illuminate\Database\Seeder;

class AirplaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Airplane::factory()->count(100)->create();
    }
}
