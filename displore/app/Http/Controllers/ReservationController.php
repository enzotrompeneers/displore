<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreReservation;
use App\Reservation;
use App\User;
use App\Availability;

use Carbon\Carbon;
use Auth;

class ReservationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservation $request)
    {
        $product_id = request('product_id');
        $reservation = new Reservation();

        $reservation->user_id = Auth::user()->id;
        $reservation->product_id = $product_id;

        $from = request('from');
        $to = request('to');
        $quantity = request('quantity');
        $price_time = request('price_time');   

        $reservation->from = Carbon::parse($from);

        if($price_time === "hour"){
            $reservation->to = Carbon::parse($from);
            $reservation->quantity = 1;

            $availability = Availability::where('product_id', $product_id)->where('date', $from);
            $availability->increment('reservations');
        } else if($price_time === "day") {
            $to = Carbon::parse($from)->addDays($quantity);
            $reservation->to = $to;
            $reservation->quantity = $quantity;

            $availability = Availability::where('product_id', $product_id)->where('date', '>=', $from)->where('date', '<=', $to);
            $availability->increment('reservations');
        }
        
        $reservation->paid = false;

        $reservation->save();

        return redirect()->route('reservation.payment', ['id' => $reservation->id]);
    }

    /**
    * Payment process for an experience
    *
    * @param 
    * @return 
    */

    public function payment($id)
    {
        $reservation = Reservation::find($id);
        $user = $reservation->product->user;
        $price = $reservation->product->price * $reservation->quantity;

        return view('reservation.payment', compact('reservation', 'user', 'price'));
    }

    /**
    * Declare a payment complete
    *
    * @param 
    * @return 
    */

    public function paymentComplete($id)
    {
        $reservation = Reservation::find($id);

        $reservation->paid = true;

        $reservation->update();

        return;
    }
}
