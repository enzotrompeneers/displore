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
	private $from;

	public function __construct($product_id, $price_time, $from)
	{
		$this->price_time = $price_time;
		$this->product_id = $product_id;
		$this->from = $from;
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
							 ->where('from', '>=', $from)
							 ->where('to', '<=', $to)
							 ->exists();
		}
		else if($this->price_time === "hour")
		{
			return Availability::where('product_id', $this->product_id)
							 ->where('from', $this->from)
							 ->where('start_hour', '>=', $to)
							 ->where('end_hour', '<=', $from)
							 ->exists();
		}
		
	}

}