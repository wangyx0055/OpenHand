<?php

class PersonTypeTableSeeder extends Seeder
{
	public function run()
	{
		PersonType::create(array(
			'id' => 1,
			'name' => 'User'
		));
		
		PersonType::create(array(
			'id' => 2,
			'name' => 'Guest'
		));
	}
}