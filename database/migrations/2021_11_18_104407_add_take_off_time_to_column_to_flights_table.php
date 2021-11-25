<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTakeOffTimeToColumnToFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->timestamp('take_off_time')->useCurrent()->after('dest');//->default(); //->useCurrentOnUpdate();
            $table->timestamp('estimated_arrival_time')->nullable()->after('take_off_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn(['take_off_time', 'estimated_arrival_time']);
        });
    }
}
