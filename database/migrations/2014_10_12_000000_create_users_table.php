<?php

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
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
//			$table->string('name');
			$table->string('username', 60)->unique();
			$table->string('email', 254)->unique();
			$table->string('password', 60);
			$table->enum('status', ['good', 'warning', 'unconfirmed']);
            $table->string('confirmation_code', 16)->nullable();
            $table->string('publisher_id');
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
		Schema::drop('users');
	}

}
