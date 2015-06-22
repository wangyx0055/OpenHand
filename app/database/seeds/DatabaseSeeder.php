<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		
		$this->call('PersonTypeTableSeeder');
		$this->call('PersonTableSeeder');
		$this->call('GuestTableSeeder');
		$this->call('GuestHistoryTableSeeder');
		$this->call('UserTypeTableSeeder');
		$this->call('UserTableSeeder');
	}

}
