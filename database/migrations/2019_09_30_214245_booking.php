<?php

use Illuminate\Suppport\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Booking extends Migration
{
	/**
	* Run the migration.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('booking', function (Blueprint $table) {
		$table->bigIncrements('id');
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
		//
	}
}
