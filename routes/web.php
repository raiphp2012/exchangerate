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

Route::prefix('email')->group(function () {
    Route::get('/','EmailController@index')->name('email.index');
    Route::post('/email','EmailController@store')->name('email.store');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/exchange-rate', 'ExchangeRateController@index');
