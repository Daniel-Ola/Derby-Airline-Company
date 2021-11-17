<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PilotRating;

class AddPilotRatingIdNullableColumnToPilotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pilots', function (Blueprint $table) {
//            $table->dropConstrainedForeignId('pilots_pilot_rating_id_foreign');
//            $table->bigInteger('pilot_rating_id')->nullable()->change();//after('empnum')->nullable()->constrained();
//            $table->foreignIdFor(PilotRating::class)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pilots', function (Blueprint $table) {
            //
        });
    }
}
