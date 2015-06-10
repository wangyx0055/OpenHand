<?php

class UserTableSeeder extends Seeder
{
	public function run()
	{
		User::create(array(
			'first_name' => 'Austin',
			'last_name' => 'Wheeler',
			'email' => 'austin.g.wheeler@gmail.com',
			'password' => Hash::Make('password'),
			'isAdmin' => 1,
		));
	}
}