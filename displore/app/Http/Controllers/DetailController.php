<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index () {
        return view ('detail');
    }
    public function show ($id) {
        return view ('detail', compact('id'));
    }
}
