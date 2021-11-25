<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCapacityColumnToAircraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('airplanes', function (Blueprint $table) {
            $table->string('capacity')
                ->after('pilot_rating_id')
                ->default(10)
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('airplanes', function (Blueprint $table) {
            $table->dropColumn('capacity');
        });
    }
}
