<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Toont de ontdekpagina
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
    * Toont de landing pagina met welkom en slagzin
    */
    public function lander(){
        return view('lander');
    }
    public function displore(){
        return view('lander');
    }
}
