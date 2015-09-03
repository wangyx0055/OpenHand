<?php

class PersonTableSeeder extends Seeder
{
	public function run()
	{
		Person::create(array(
			'id' => 1,
			'first_name' => 'Admin',
			'last_name' => 'Admin',
			'person_type' => 1
		));
		
		Person::create(array(
			'id' => 2,
			'first_name' => 'Bob',
			'last_name' => 'Smith',
			'person_type' => 2
		));
		
		Person::create(array(
			'id' => 3,
			'first_name' => 'Charles',
			'last_name' => 'Davidson',
			'person_type' => 2
		));
		
		Person::create(array(
			'id' => 4,
			'first_name' => 'Robert',
			'last_name' => 'Mackson',
			'person_type' => 2
		));
		
		Person::create(array(
			'id' => 5,
			'first_name' => 'Luis',
			'last_name' => 'Clark',
			'person_type' => 2
		));
		
		Person::create(array(
			'id' => 6,
			'first_name' => 'Mark',
			'last_name' => 'Powell',
			'person_type' => 2
		));
	}
}