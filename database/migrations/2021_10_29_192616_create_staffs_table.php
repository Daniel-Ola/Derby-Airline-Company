<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('EMPNUM')->index();//->unique();
            $table->string('SURNAME');
            $table->string('NAME');
            $table->text('ADDRESS');
            $table->string('PHONE');
            $table->string('SALARY');
            $table->unsignedBigInteger('STAFF_ROLE_ID');
            $table->foreign('STAFF_ROLE_ID')->references('ID')->on('staff_roles');
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
        Schema::dropIfExists('staffs');
    }
}
