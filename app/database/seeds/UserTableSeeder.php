<?php

class UserTableSeeder extends Seeder
{
	public function run()
	{
		User::create(array(
			'first_name' => 'Admin',
			'last_name' => '',
			'email' => 'admin@openhand.com',
			'password' => Hash::Make('password'),
			'isAdmin' => 1,
		));
		
		User::create(array(
			'first_name' => 'Volunteer 1',
			'last_name' => '',
			'email' => 'volunteer1@openhand.com',
			'password' => Hash::Make('password'),
			'isAdmin' => 0,
		));
		
		User::create(array(
			'first_name' => 'Volunteer 2',
			'last_name' => '',
			'email' => 'volunteer2@openhand.com',
			'password' => Hash::Make('password'),
			'isAdmin' => 0,
		));
	}
}