<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
    	return view('profile');
    }

    public function password()
    {
    	return view('password');
    }

    public function offers()
    {

    }

    public function reservations()
    {

    }
}
