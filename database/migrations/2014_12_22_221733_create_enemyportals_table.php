<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnemyportalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enemyportals', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('owner');
            $table->string('title');
            $table->string('lat');
            $table->string('lng');
			$table->string('city');
			$table->string('state');
			$table->integer('zip');
            $table->boolean('dead')->default(0);
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
		Schema::drop('enemyportals');
	}

}
