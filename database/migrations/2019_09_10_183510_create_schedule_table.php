<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
   
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ident', 9);
            $table->string('route_code', '255')->nullable(true)->default(null);
            $table->string('origin', 4);
            $table->string('destination', 4);
            $table->string('days', '20')->nullable(true)->default(null);
            $table->integer('departuretime', '16');
            $table->integer('arrivaltime', '16');
            $table->string('altitude', '16')->nullable(true)->default(null);
            $table->string('flight_time', '16');
            $table->string('aircrafttype', '16');
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
