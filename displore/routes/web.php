<?php
/**
*  Alle displore routes
*
*/

//Authentication routes
Auth::routes();

//Product routes
Route::get('/ontdek', 'ProductController@index')->name('discover');
Route::post('/ontdek/zoeken', 'ProductController@search')->name('discover.search');
Route::get('/ervaring/maken', 'ProductController@create')->name('product.create');
Route::post('/ervaring/maken', 'ProductController@store')->name('product.store');
Route::get('/ervaring/toon/{id}', 'ProductController@show');

//Home routes
Route::get('/', 'HomeController@lander')->name('lander');
