<?php

namespace Database\Seeders;

use App\Models\CrewMember;
use App\Models\Staff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrewMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        CrewMember::create([
//            'empnum' => 'EMP100',
//            'flightnum' => 'DERFLY100',
//            'staff_role_id' => 6
//        ]);
//        CrewMember::create([
//            'empnum' => 'EMP101',
//            'flightnum' => 'DERFLY100',
//            'staff_role_id' => 5
//        ]);


        CrewMember::create([
            'empnum' => 'EMP102',
            'flightnum' => 'DERFLY100',
            'staff_role_id' => 4
        ]);
        CrewMember::create([
            'empnum' => 'EMP103',
            'flightnum' => 'DERFLY100',
            'staff_role_id' => 3
        ]);
        CrewMember::create([
            'empnum' => 'EMP104',
            'flightnum' => 'DERFLY100',
            'staff_role_id' => 2
        ]);

        CrewMember::create([
            'empnum' => 'EMP105',
            'flightnum' => 'DERFLY100',
            'staff_role_id' => 1
        ]);

//        CrewMember::create([
//            'empnum' => 'EMP185',
//            'flightnum' => 'DERFLY185',
//            'staff_role_id' => 4
//        ]);
//        CrewMember::create([
//            'empnum' => 'EMP153',
//            'flightnum' => 'DERFLY185',
//            'staff_role_id' => 3
//        ]);
//        CrewMember::create([
//            'empnum' => 'EMP122',
//            'flightnum' => 'DERFLY185',
//            'staff_role_id' => 2
//        ]);
//        CrewMember::create([
//            'empnum' => 'EMP193',
//            'flightnum' => 'DERFLY185',
//            'staff_role_id' => 1
//        ]);
    }
}
