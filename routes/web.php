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

Route::get('/', 'FrontController@index');
Route::get('/fleet', 'FleetController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/commandments', 'CommandmentsController@index');
Route::get('/test', 'CommandmentsController@test');
Route::get('/roster', 'RosterController@index');
Route::get('/contact', 'FrontController@contact');
Route::get('/dispatch', 'DispatchController@index');
Route::get('/schedule', 'ScheduleController@index');
Route::get('/booking', 'BookingController@index');

Route::prefix('admin')->middleware('auth')->group(function(){
	Route::post('/airports', 'Admin\AirportController@store');
	Route::get('/airports', 'Admin\AirportController@index');
});

Route::prefix('api')->group(function() {
    Route::prefix('schedule')->group(function() {
        Route::get('/arrival/{icao}', 'Api\ScheduleController@searchByArrivalAirport');
        Route::get('/departure/{icao}', 'Api\ScheduleController@searchByDepartureAirport');
        Route::get('/all/{departure}/{arrival}', 'Api\ScheduleController@searchByArrAndDep');
    });
});
