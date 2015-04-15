<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->string('agent');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('plusprofile');
			$table->integer('level');
			$table->integer('faction');
			$table->string('avatar');
            $table->string('city');
            $table->string('state');
            $table->string('postalcode');
            $table->string('country');
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
