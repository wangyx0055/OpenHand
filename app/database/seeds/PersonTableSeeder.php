<?php

class PersonTableSeeder extends Seeder
{
	public function run()
	{
		Person::create(array(
			'first_name' => 'Austin',
			'last_name' => 'Wheeler',
			'person_type' => 1
		));
	}
}