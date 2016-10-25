<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'ApplicationController@index');
Route::post('/hotels/{id}', 'HotelsController@addHotel');
Route::get('/marathons', 'MarathonsController@index');
Route::post('/marathons', 'MarathonsController@addMarathons');
Route::get('/cart', 'ShoppingCartController@index');
Route::get('/cart/destroy', 'ShoppingCartController@destroy');
Route::post('/add-attendees', 'AttendeesController@create');
Route::get('/payment', 'ShoppingCartController@payment');
Route::post('/addExtra/{id}', 'ApplicationController@addExtra');

Route::post('/handle3D', 'FinansbankController@handle3D');