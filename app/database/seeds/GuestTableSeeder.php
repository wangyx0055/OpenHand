<?php

class GuestTableSeeder extends Seeder
{
	public function run()
	{
		Guest::create(array(
			'first_name' => 'Bob',
			'last_name' => 'Smith',
			'address' => 'Some Address',
			'zipcode' => '10101',
		));
		
		Guest::create(array(
			'first_name' => 'Charles',
			'last_name' => 'Alred',
			'address' => 'Some Address',
			'zipcode' => '10121',
		));
		
		Guest::create(array(
			'first_name' => 'Adam',
			'last_name' => 'Lamb',
			'address' => 'Some Address',
			'zipcode' => '33101',
		));
		
		Guest::create(array(
			'first_name' => 'Jessica',
			'last_name' => 'Dorber',
			'address' => 'Some Address',
			'zipcode' => '10551',
		));
		
		Guest::create(array(
			'first_name' => 'Lindsey',
			'last_name' => 'Nielson',
			'address' => 'Some Address',
			'zipcode' => '10351',
		));
		
		Guest::create(array(
			'first_name' => 'Ryan',
			'last_name' => 'Jones',
			'address' => 'Some Address',
			'zipcode' => '10321',
		));
	}
}