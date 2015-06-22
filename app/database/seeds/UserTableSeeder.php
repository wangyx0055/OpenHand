<?php

class UserTableSeeder extends Seeder
{
	public function run()
	{
		User::create(array(
			'email' => 'admin@openhand.com',
			'password' => Hash::Make('password'),
			'person_id' => 1,
			'user_type' => 2
		));
	}
}