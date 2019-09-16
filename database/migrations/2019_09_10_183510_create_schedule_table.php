<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ident', 9);
	    $table->string('actual_ident', 9)->nullable(true)->default(null);
	    $table->integer('departuretime');
	    $table->integer('arrivaltime');
	    $table->string('origin', 4);
	    $table->string('destination', 4);
	    $table->string('aircrafttype', 4);
	    $table->string('meal_service', 24);
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
        Schema::dropIfExists('schedule');
    }
}
