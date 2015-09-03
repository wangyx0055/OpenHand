<?php

class GuestTableSeeder extends Seeder
{
	public function run()
	{
		Guest::create(array(
			'id' => 1,
			'spouse_name' => 'Mavis',
			'address' => '123 s 456 w',
			'zipcode' => 34567,
			'last_visit' => \Carbon\Carbon::now()->toDateTimeString(),
			'person_id' => 2,
		));
		
		Guest::create(array(
			'id' => 2,
			'spouse_name' => 'Anita',
			'address' => '132 s 432 w',
			'zipcode' => 34527,
			'last_visit' => \Carbon\Carbon::now()->toDateTimeString(),
			'person_id' => 3,
		));
		
		Guest::create(array(
			'id' => 3,
			'spouse_name' => 'Phillis',
			'address' => '13th Street',
			'zipcode' => 44527,
			'last_visit' => \Carbon\Carbon::now()->toDateTimeString(),
			'person_id' => 4,
		));
		
		Guest::create(array(
			'id' => 4,
			'spouse_name' => 'Margaret',
			'address' => '865 w Harrison Blvd',
			'zipcode' => 34592,
			'last_visit' => \Carbon\Carbon::now()->toDateTimeString(),
			'person_id' => 5,
		));
		
		Guest::create(array(
			'id' => 5,
			'spouse_name' => 'Annie',
			'address' => '562 s 932 w',
			'zipcode' => 34677,
			'last_visit' => \Carbon\Carbon::now()->toDateTimeString(),
			'person_id' => 6,
		));
	}
}