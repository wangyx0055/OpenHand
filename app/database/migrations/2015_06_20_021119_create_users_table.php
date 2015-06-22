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
			$table->string('email', 320);
         	$table->string('password', 64);
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('people');
			$table->integer('user_type')->unsigned();
			$table->foreign('user_type')->references('id')->on('user_types');
			
			// required by laravel 4.2
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
