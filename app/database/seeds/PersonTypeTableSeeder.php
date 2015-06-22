<?php

class PersonTypeTableSeeder extends Seeder
{
	public function run()
	{
		PersonType::create(array(
			'name' => 'User'
		));
		
		PersonType::create(array(
			'name' => 'Guest'
		));
	}
}