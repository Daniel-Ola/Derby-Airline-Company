<?php

namespace Database\Seeders;

use App\Models\StaffRole;
use Illuminate\Database\Seeder;

class StaffRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StaffRole::create([
            'title' => 'Air Hostess'
        ]);
        StaffRole::create([
            'title' => 'Flight Attendant'
        ]);
        StaffRole::create([
            'title' => 'Aircraft Engineer'
        ]);
        StaffRole::create([
            'title' => 'Navigator'
        ]);
        StaffRole::create([
            'title' => 'Co-Pilot'
        ]);
        StaffRole::create([
            'title' => 'Pilot'
        ]);
//        StaffRole::factory()->count(5)->create();
    }
}
