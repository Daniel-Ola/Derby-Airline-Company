<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_members', function (Blueprint $table) {
            $table->id();
            $table->string('empnum');
            $table->foreign('empnum')->references('empnum')->on('staffs')->cascadeOnUpdate();
            $table->string('flightnum');
            $table->foreign('flightnum')->references('flightnum')->on('flights')->cascadeOnUpdate();
            $table->foreignId('staff_role_id')->constrained();
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
        Schema::dropIfExists('crew_members');
    }
}
