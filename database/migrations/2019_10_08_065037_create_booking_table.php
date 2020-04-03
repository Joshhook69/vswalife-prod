<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ident')->nullable(true)->default(null);
            $table->string('user_id', '255');
            $table->string('origin', '255')->nullable(false);
            $table->string('destination', '255')->nullable(false);
            $table->longText('route')->nullable(false);
            $table->string('altitude', '255')->nullable(false);
            $table->string('air_time', '255')->nullable(true);
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
        Schema::dropIfExists('booking');
    }
}
