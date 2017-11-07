<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Product;
use App\Reservation;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();

    	return view('user.profile', compact('user'));
    }

    public function password()
    {
    	return view('user.password');
    }

    public function passwordChange(){
        $user = Auth::user();

        if(
            $user->password === bcrypt(request('old_password')) && 
            request('new_password') === request('new_password_again')
        )
        {
            $user->password = bcrypt(request('new_password'));
            $user->update();
        }
        else
        {
            echo "Nope das fout";
        }

        // $validation = 
       

        return redirect()->route('user.password');
    }

    public function offers()
    {
        $user_id = Auth::user()->id;

        $products = Product::where('user_id', $user_id)->get();

        return view('user.offers', compact('products'));
    }

    public function update(StoreUser $request)
    {
        $user = Auth::user();

        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->street = request('street');
        $user->house_nr = request('house_nr');
        $user->city = request('city');
        $user->country = request('country');

        $user->update();

        return redirect()->route('user.profile');
    }

    public function paypal(Request $request)
    {
        $user = Auth::user();

        $validator = $request->validate([
            'paypal' => 'required|unique:users|email'
        ]);

        $user->paypal = request('paypal');
        $user->update();

        return redirect()->route('user.profile');
    }

    public function reservations()
    {
        $my_reservations = Reservation::where('user_id', Auth::user()->id)->get();

        $products = Product::where('user_id', Auth::user()->id)->get();
        
        return view('user.reservations', compact('my_reservations', 'products'));
    }
}
