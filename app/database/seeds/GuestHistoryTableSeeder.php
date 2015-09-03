<?php

class GuestHistoryTableSeeder extends Seeder
{
	public function run()
	{
		GuestHistory::create(array(
			'id' => 1,
			'date_of_visit' => \Carbon\Carbon::createFromDate(2015, 7, 22)->toDateTimeString(),
			'guest_id' => '1',
		));
		
		GuestHistory::create(array(
			'id' => 2,
			'date_of_visit' => \Carbon\Carbon::createFromDate(2015, 5, 14)->toDateTimeString(),
			'guest_id' => '2',
		));
		
		GuestHistory::create(array(
			'id' => 3,
			'date_of_visit' => \Carbon\Carbon::createFromDate(2015, 4, 9)->toDateTimeString(),
			'guest_id' => '3',
		));
		
		GuestHistory::create(array(
			'id' => 4,
			'date_of_visit' => \Carbon\Carbon::createFromDate(2015, 4, 9)->toDateTimeString(),
			'guest_id' => '4',
		));
		
		GuestHistory::create(array(
			'id' => 5,
			'date_of_visit' => \Carbon\Carbon::createFromDate(2015, 3, 2)->toDateTimeString(),
			'guest_id' => '5',
		));
		
		GuestHistory::create(array(
			'id' => 6,
			'date_of_visit' => \Carbon\Carbon::createFromDate(2015, 8, 15)->toDateTimeString(),
			'guest_id' => '1',
		));
		
		GuestHistory::create(array(
			'id' => 7,
			'date_of_visit' => \Carbon\Carbon::createFromDate(2015, 8, 15)->toDateTimeString(),
			'guest_id' => '2',
		));
		
		GuestHistory::create(array(
			'id' => 8,
			'date_of_visit' => \Carbon\Carbon::createFromDate(2015, 7, 21)->toDateTimeString(),
			'guest_id' => '3',
		));
		
		GuestHistory::create(array(
			'id' => 9,
			'date_of_visit' => \Carbon\Carbon::createFromDate(2015, 6, 21)->toDateTimeString(),
			'guest_id' => '4',
		));
		
		GuestHistory::create(array(
			'id' => 10,
			'date_of_visit' => \Carbon\Carbon::createFromDate(2015, 5, 9)->toDateTimeString(),
			'guest_id' => '5',
		));
		
		GuestHistory::create(array(
			'id' => 11,
			'date_of_visit' => \Carbon\Carbon::now()->toDateTimeString(),
			'guest_id' => '1',
		));
		
		GuestHistory::create(array(
			'id' => 12,
			'date_of_visit' => \Carbon\Carbon::now()->toDateTimeString(),
			'guest_id' => '2',
		));
		
		GuestHistory::create(array(
			'id' => 13,
			'date_of_visit' => \Carbon\Carbon::now()->toDateTimeString(),
			'guest_id' => '3',
		));
		
		GuestHistory::create(array(
			'id' => 14,
			'date_of_visit' => \Carbon\Carbon::now()->toDateTimeString(),
			'guest_id' => '4',
		));
		
		GuestHistory::create(array(
			'id' => 15,
			'date_of_visit' => \Carbon\Carbon::now()->toDateTimeString(),
			'guest_id' => '5',
		));
	}
}