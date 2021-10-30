<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntermediateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intermediate_cities', function (Blueprint $table) {
            $table->id();
            $table->string('FLIGHTNUM');
            $table->foreign('FLIGHTNUM')->references('FLIGHTNUM')->on('flights');
            $table->string('CITY');
            $table->timestamp('ARR_TIME')->useCurrent();
            $table->timestamp('DEP_TIME')->useCurrent();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intermediate_cities');
    }
}
