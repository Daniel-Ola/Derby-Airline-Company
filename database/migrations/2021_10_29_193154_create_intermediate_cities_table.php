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
            $table->string('flightnum');
            $table->foreign('flightnum')->references('flightnum')->on('flights');
            $table->string('city');
            $table->timestamp('arr_time')->useCurrent();
            $table->timestamp('dep_time')->useCurrent();
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
