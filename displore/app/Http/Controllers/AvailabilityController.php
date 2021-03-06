<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAvailability;
use App\Http\Helpers\ReservationHelper;
use Carbon\Carbon;

use App\Product;
use App\Availability;

class AvailabilityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);
        $availabilities = Availability::where('product_id', $id)->orderBy("date")->get();

        return view('availability.create', compact('product', 'availabilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $availability = new Availability();
        $product = Product::find($product_id);
        
        $from = request('from');
        $to = request('to');
        $start_hour = request('start_hour');
        $end_hour = request('end_hour');
        $capacity = intval(request('capacity'));

        $reservationHelper = new ReservationHelper($product_id, $product->price_time, $from);



        $availability->product_id = $product_id;
        $availability->date = $from;
        
        if($reservationHelper->isDay())
        {
            $request->validate([
                'from' => 'required',
                'to' => 'required'
            ]);

            if($reservationHelper->hasAvailabilityOverlap($from, $to)){
                return redirect()->route('availability.create', ['id' => $product_id])->withErrors(['overlap' => 'Er is overlap met een al bestaande beschikbaarheid']);
            }

            $fromParsed = Carbon::parse($from);
            $toParsed = Carbon::parse($to);

            $days = $toParsed->diffInDays($fromParsed);

            $availability->save();

            $id = $availability->id;

            $availability->group = $id;

            $availability->capacity = $capacity;

            $availability->update();

            $today = $fromParsed;

            for($day = 1; $day < $days; $day++)
            {
                $availability = new Availability();
                $availability->product_id = $product_id;
                $availability->date = $today;
                $availability->capacity = $capacity;
                $availability->group = $id;

                if(!$availability
                    ->where('date', $today)
                    ->where('product_id', $product_id)
                    ->exists()
                )
                {
                    $availability->save();
                }

                $today = $fromParsed->addDays(1);
            }
        }
        else{
            $request->validate([
                'from' => 'required',
                'start_hour' => 'required',
                'end_hour' => 'required',
                'capacity' => 'required|numeric'
            ]);

            $availability->start_hour = Carbon::parse($from . " " . $start_hour);
            $availability->end_hour = Carbon::parse($from . " " . $end_hour);

            $availability->capacity = $capacity;

            if($reservationHelper->hasAvailabilityOverlap($start_hour, $end_hour)){
                return redirect()->route('availability.create', ['id' => $product_id])->withErrors(['overlap' => 'Er is overlap met een al bestaande beschikbaarheid']);
            }

            $availability->save();
        }

        return redirect()->route('availability.create', ['id' => $product_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $availability = Availability::find($id);

        $product_id = $availability->product_id;

        $availability->delete();

        return redirect()->route('availability.create', ['id' => $product_id]);
    }
}
