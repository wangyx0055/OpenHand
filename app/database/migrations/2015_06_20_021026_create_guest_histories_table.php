<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestHistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guest_histories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('date_of_visit');
			$table->integer('guest_id')->unsigned();
			$table->foreign('guest_id')->references('id')->on('guests');
			
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
		Schema::drop('guest_histories');
	}

}
