<?php 
use Illuminate\Support\Facades\Schema; 
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Database\Migrations\Migration; 

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', '255');
            $table->dateTime('last_login_at');
            $table->string('last_login_ip', '96');
            $table->string('email', '255')->unique();
            $table->string('swa_id', '7')->default(Pending);
            $table->string('crew_base', '9')->nullable(true)->default(null);
            $table->integer('dispatcher', '1')->default(0);
            $table->integer('staff', '1')->default(0);
	        $table->string('roles', '32')->nullable(true)->default(TRAINEE);
            $table->integer('can_fly', '1')->default(0);
            $table->integer('vatsim_cid', '8')->nullable(true)->default(null);
            $table->integer('status', '1')->nullable(true)->default(null)
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
