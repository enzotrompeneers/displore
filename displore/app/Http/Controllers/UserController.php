<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
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

    public function offers()
    {
        $user_id = Auth::user()->id;

        $products = Product::where('user_id', $user_id)->get();

        return view('user.offers', compact('products'));
    }

    public function update(Request $request)
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

        return redirect('/gebruiker');
    }

    public function reservations()
    {

    }
}
