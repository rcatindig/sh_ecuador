<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// -- Service Provider
Route::resource('serviceproviders','ServiceProviderController');
Route::get('serviceproviders/create','ServiceProviderController@create');
Route::get('serviceproviders/edit/{id}','ServiceProviderController@edit');

// -- Prepaid Cards
Route::resource('prepaidcards','PrepaidCardController');
Route::get('prepaidcards/edit/{id}','PrepaidCardController@edit');
Route::post('prepaidcards/generate','PrepaidCardController@generate');

// -- Batches
Route::resource('batches','BatchController');
