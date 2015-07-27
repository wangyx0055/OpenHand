<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("spouse_name", 32);
			$table->string('address', 128);
			$table->string('zipcode', 5);
			$table->string('note', 256);
			$table->dateTime('last_visit');
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('people');
			
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
		Schema::drop('guests');
	}

}
