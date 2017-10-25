<?php 

namespace App\Http\Helpers;

use App\Reservation;
use App\Availability;

use Auth;
/**
* Helper klasse om te controleren of reservaties mogen en wat de beschikbaarheid is van een ervaring
* 
*/

class ReservationHelper{
	private $price_time;
	private $product_id;

	public function __construct($product_id, $price_time, $from)
	{
		$this->price_time = $price_time;
	}

	public function isDay(){
		if($this->price_time === "day"){
			return true;
		}else{
			return false;
		}
	}

	public function hasAvailabilityOverlap($from, $to)
	{
		if($this->price_time === "day")
		{
			return Availability::where('product_id', $this->product_id)
							 ->where('to', '<=', $to)
							 ->orWhere('from', '>=', $from)
							 ->exists();
		}
		else if($this->price_time === "hour")
		{
			return Availability::where('product_id', $this->product_id)
							->where('from', $date)
							 ->where('start_hour', '<=', $start_hour)
							 ->orWhere('end_hour', '>=', $end_hour)
							 ->exists();
		}
		
	}

}