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
    	return view('user.profile');
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

    public function reservations()
    {

    }
}
