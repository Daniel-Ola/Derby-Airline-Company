<?php

namespace App\Console\Commands;

use App\Models\Flight;
use App\Models\IntermediateCity;
use App\Models\Passenger;
use App\Models\Pilot;
use App\Models\Staff;
use Illuminate\Console\Command;
use Faker\Generator as Faker;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alter:tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change Flight Numbers in tables';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Faker $faker)
    {
//        $pilots = Pilot::select('empnum')->pluck('empnum');
//        Staff::whereIn('empnum', $pilots)->update([
//            'staff_role_id' => 6
//        ]);
//
//        Schema::table('flights', function (Blueprint $table) {
//            $table->unsignedBigInteger('pilot_id')->nullable()->change();
//        });

//        Schema::table('crew_members', function (Blueprint $table) {
//            $table->unsignedBigInteger('staff_role_id')->nullable()->change();
//        });

        Schema::table('airplanes', function (Blueprint $table) {
            $table->string('numser')->nullable()->change();
        });

//        Schema::table('pilot_ratings', function (Blueprint $table) {
//            $table->string('airplane_id')->change();
////            $table->dropForeign('pilot_ratings_airplane_id_foreign');
////            $table->dropConstrainedForeignId('airplane_id');
//        });
//        $model = $this->argument('model');
////        if ($model == 'flight' || $model == 'flights') {
//        for ($i = 1; $i <= 100; $i++) {
//            $num = $i;
//            if ($i < 10)
//                $num = '00' . $i;
//            if ($i > 9 && $i < 100)
//                $num = '0' . $i;
//            Flight::whereId($i)->update([
//                'flightnum' => 'DERFLY' . $num
//            ]);
//        }
////        } else if ($model == 'intermediate_cities' || $model == 'intermediate_city') {
//        for ($i = 1; $i <= 100; $i++) {
//            $num = $i;
//            if ($i < 10)
//                $num = '00' . $i;
//            if ($i > 9 && $i < 100)
//                $num = '0' . $i;
//            IntermediateCity::whereId($i)->update([
//                'flightnum' => 'DERFLY' . $num
//            ]);
//        }
//
//        for ($i = 1; $i <= 100; $i++) {
//            $num = $i;
//            if ($i < 10)
//                $num = '00' . $i;
//            if ($i > 9 && $i < 100)
//                $num = '0' . $i;
//            Staff::create([
//                'empnum' => 'EMP' . $num,
//                'surname' => $faker->lastName,
//                'name' => $faker->firstName,
//                'address' => $faker->address,
//                'phone' => $faker->phoneNumber,
//                'salary' => $faker->randomFloat(),
//                'staff_role_id' => $faker->numberBetween(1, 5)
//            ]);
//        }
//
//
//        //        add unique property to pilot's empnum
//
//        Schema::table('flights', function (Blueprint $table) {
//            $table->string('flightnum')->unique()->change();
//        });

        return Command::SUCCESS;
    }
}

