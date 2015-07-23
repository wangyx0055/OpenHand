<?php

class GuestHistory extends Eloquent
{
	// search database for all records between the two dates and count them
	public function scopeGetGuestCount($query, $begin, $end)
	{
		return $query
				->select('id')
				->where('date_of_visit', '>=', date('Y-m', strtotime($begin . " +1 days")))
				->where('date_of_visit', '<=', date('Y-m', strtotime($end . " +31 days")));;
	}
}