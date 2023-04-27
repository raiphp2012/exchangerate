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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('email')->group(function () {
    Route::get('/','EmailController@index')->name('email.index');
    Route::post('/email','EmailController@store')->name('email.store');
});

Route::get('/verifyemail/{token}', 'EmailController@verify');
Auth::routes();



Route::get('/', 'HomeController@index')->name('home');
Route::get('/exchange-rate', 'ExchangeRateController@index');


Route::post('/doctor/update-availability/{doctorId}', 'DoctorController@updateAvailability')->name('doctor.updateAvailability');
