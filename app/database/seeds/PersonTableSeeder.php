<?php

class PersonTableSeeder extends Seeder
{
	public function run()
	{
		Person::create(array(
			'first_name' => '',
			'last_name' => '',
			'person_type' => 1
		));
	}
}