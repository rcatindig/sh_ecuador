<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
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
