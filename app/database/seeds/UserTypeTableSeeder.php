<?php

class UserTypeTableSeeder extends Seeder
{
	public function run()
	{
		UserType::create(array(
			'name' => 'Basic'
		));
		
		UserType::create(array(
			'name' => 'Admin'
		));
	}
}