<?php
/**
*  Alle displore routes
*
*/

//Authentication routes
Auth::routes();

//User routes
Route::get('/gebruiker', 'UserController@profile')->name('user.profile');
Route::get('/gebruiker/wachtwoord', 'UserController@password')->name('user.password');
Route::get('/gebruiker/ervaringen', 'UserController@offers')->name('user.offers');
Route::get('/gebruiker/reservaties', 'UserController@reservations')->name('user.reservations');

//Product routes
Route::get('/ontdek', 'ProductController@index')->name('discover');
Route::post('/ontdek/zoeken', 'ProductController@search')->name('discover.search');
Route::get('/ervaring/maken', 'ProductController@create')->name('product.create');
Route::post('/ervaring/maken', 'ProductController@store')->name('product.store');
Route::get('/ervaring/toon/{id}', 'ProductController@show')->name('product.show');
Route::get('/ervaring/bewerken/{id}', 'ProductController@edit')->name('product.edit');
Route::patch('/ervaring/bewerken/{id}', 'ProductController@update')->name('product.update');

//Home routes
Route::get('/', 'HomeController@lander')->name('lander');
