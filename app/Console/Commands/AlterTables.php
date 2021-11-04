<?php

namespace App\Console\Commands;

use App\Models\Flight;
use App\Models\IntermediateCity;
use App\Models\Passenger;
use Illuminate\Console\Command;

class AlterTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:flightnum {model?}';

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
    public function handle()
    {
        $model = $this->argument('model');
//        if ($model == 'flight' || $model == 'flights') {
            for ($i = 1; $i <= 100; $i++) {
                $num = $i;
                if ($i < 10)
                    $num = '00' . $i;
                if ($i > 9 && $i < 100)
                    $num = '0' . $i;
                Flight::whereId($i)->update([
                    'flightnum' => 'DERFLY' . $num
                ]);
            }
//        } else if ($model == 'intermediate_cities' || $model == 'intermediate_city') {
            for ($i = 1; $i <= 100; $i++) {
                $num = $i;
                if ($i < 10)
                    $num = '00' . $i;
                if ($i > 9 && $i < 100)
                    $num = '0' . $i;
                IntermediateCity::whereId($i)->update([
                    'flightnum' => 'DERFLY' . $num
                ]);
            }
//        }
        return Command::SUCCESS;
    }
}
