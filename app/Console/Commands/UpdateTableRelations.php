<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableRelations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Schema::table('passengers', function (Blueprint $table) {
            $table->dropForeign('passengers_flightnum_foreign');
            $table->foreign('flightnum')->references('flightnum')->on('flights')->cascadeOnUpdate();
        });

        Schema::table('intermediate_cities', function (Blueprint $table) {
            $table->dropForeign('intermediate_cities_flightnum_foreign');
            $table->foreign('flightnum')->references('flightnum')->on('flights')->cascadeOnUpdate();
        });

        Schema::table('flights', function (Blueprint $table) {
            $table->string('flightnum')->unique()->change();
        });
        return Command::SUCCESS;
    }
}
