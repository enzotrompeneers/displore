<?php 

namespace App\Http\Helpers;

use Illuminate\Support\Facades\DB;

use App\Reservation;
use App\Availability;
use Carbon\Carbon;

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
							 ->where('date', '=', $from)
							 ->exists();
		}
		else if($this->price_time === "hour")
		{
			return Availability::where('product_id', $this->product_id)
							 ->where('date', $this->from)
							 ->where('start_hour', '>=', Carbon::parse($from))
							 ->where('end_hour', '<=', Carbon::parse($to))
							 ->exists();
		}
		
	}

}