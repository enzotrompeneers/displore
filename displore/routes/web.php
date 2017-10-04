<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@index'); 
Route::get('login', 'LoginController@index');
Route::get('register', 'RegisterController@index');
Route::get('detail', 'DetailController@index');
Route::get('offer', 'OfferController@index');
Route::get('discover', 'DiscoverController@index');
Route::get('discover/{id}', 'DiscoverController@show');