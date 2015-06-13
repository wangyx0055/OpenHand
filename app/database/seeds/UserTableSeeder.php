<?php

class UserTableSeeder extends Seeder
{
	public function run()
	{
		User::create(array(
			'name' => 'Admin',
			'email' => 'admin@openhand.com',
			'password' => Hash::Make('password'),
			'isAdmin' => 1,
		));
		
		User::create(array(
			'name' => 'Volunteer 1',
			'email' => 'volunteer1@openhand.com',
			'password' => Hash::Make('password'),
			'isAdmin' => 0,
		));
		
		User::create(array(
			'name' => 'Volunteer 2',
			'email' => 'volunteer2@openhand.com',
			'password' => Hash::Make('password'),
			'isAdmin' => 0,
		));
	}
}