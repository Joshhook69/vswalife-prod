<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePirepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pirep', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('dep_apt', '4');
            $table->string('arr_apt', '4');
            $table->string('aircraft_type', '4');
            $table->string('distance', '5');
            $table->string('cruise_alt', '9');
            $table->string('landing_rate', '4');
            $table->string('route', '248');
            $table->string('fuel_consumed', '8');
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
        Schema::dropIfExists('pirep');
    }
}
