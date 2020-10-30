<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet', function (Blueprint $table) {
            $table->integer('id');
            $table->string('registration', 6);
            $table->string('model', 11);
            $table->string('type', 4)->nullable(true)->default(null);
            $table->string('selcal', 4)->nullable(true)->default(null);
            $table->integer('built');
            $table->string('delivery', 11);
            $table->string('status', 9);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fleet');
    }
}
