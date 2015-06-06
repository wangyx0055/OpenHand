<?php

class UserTableSeeder extends Seeder
{
	public function run()
	{
		User::create(array(
		  'username' => 'test',
		  'name' => 'test',
		  'email' => 'openhand@example.com',
		  'password' => Hash::Make('password'),
		));
	}
}