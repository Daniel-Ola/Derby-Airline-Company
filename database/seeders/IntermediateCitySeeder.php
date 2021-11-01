<?php

namespace Database\Seeders;

use App\Models\IntermediateCity;
use Illuminate\Database\Seeder;

class IntermediateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IntermediateCity::factory()->count(100)->create();
    }
}
