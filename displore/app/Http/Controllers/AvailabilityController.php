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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);
        $availabilities = Availability::where('product_id', $id)->orderBy("date")->get();

        // $availabilitiesExport = array();

        // foreach($availabilities as $availability){
        //     array_push($availabilitiesExport, array(
        //         "from" => $availabilities->where('group', )
        //         "to" => 
        //     ));
        // }

        return view('availability.create', compact('product', 'availabilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAvailability $request, $product_id)
    {
        $availability = new Availability();
        $product = Product::find($product_id);
        
        $from = request('from');
        $to = request('to');
        $start_hour = request('start_hour');
        $end_hour = request('end_hour');

        $reservationHelper = new ReservationHelper($product_id, $product->price_time, $from);

        $availability->product_id = $product_id;
        $availability->date = $from;
        
        if($reservationHelper->isDay())
        {
            if($reservationHelper->hasAvailabilityOverlap($from, $to)){
                return redirect()->route('availability.create', ['id' => $product_id])->withErrors(['overlap' => 'Er is overlap met een al bestaande beschikbaarheid']);
            }

            $fromParsed = Carbon::parse($from);
            $toParsed = Carbon::parse($to);

            $days = $toParsed->diffInDays($fromParsed);

            $availability->save();

            $id = $availability->id;

            $availability->group = $id;

            $availability->update();

            $today = $fromParsed;

            for($day = 1; $day < $days; $day++)
            {
                $availability = new Availability();
                $availability->product_id = $product_id;
                $availability->date = $today;
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

            $availability->start_hour = Carbon::parse($from . " " . $start_hour);
            $availability->end_hour = Carbon::parse($from . " " . $end_hour);

            if($reservationHelper->hasAvailabilityOverlap($start_hour, $end_hour)){
                return redirect()->route('availability.create', ['id' => $product_id])->withErrors(['overlap' => 'Er is overlap met een al bestaande beschikbaarheid']);
            }

            $availability->save();
        }

        return redirect()->route('availability.create', ['id' => $product_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
