<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', '255');
            $table->dateTime('event_start')->nullable(true);
            $table->dateTime('event_end')->nullable(true);
            $table->text('banner_link')->nullable(true);
            $table->text('description')->nullable(true);
            $table->string('host', '255')->nullable(true);
            $table->integer('status', '11')->default(1);
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
        Schema::dropIfExists('events');
    }
}
