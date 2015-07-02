<?php

class UserTypeTableSeeder extends Seeder
{
	public function run()
	{
		UserType::create(array(
			'id' => 1,
			'name' => 'Basic'
		));
		
		UserType::create(array(
			'id' => 2,
			'name' => 'Admin'
		));
	}
}