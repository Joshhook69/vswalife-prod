<?php

use Illuminate\Support\Facades\Input;
use App\User;
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
// Defualt auth routes and home page as well as fleet

/*
Route::prefix('admin')->middleware('auth')->group(function(){
	Route::post('/airports', 'Admin\AirportController@store');
	Route::get('/airports', 'Admin\AirportController@index');
});
Not Implemented im pretty sure^^^
*/

Route::prefix('airport')->group(function(){
	Route::get('/index', 'Airport\AirportController@index');
});
//list of all airports swa flies to

Route::prefix('api')->group(function() {
    Route::prefix('schedule')->group(function() {
    Route::get('/arrival/{icao}', 'Api\ScheduleController@searchByArrivalAirport');
    Route::get('/departure/{icao}', 'Api\ScheduleController@searchByDepartureAirport');
    Route::get('/all/{departure}/{arrival}', 'Api\ScheduleController@searchByArrAndDep');
    });
});
//api routes for interfacing with acars client(im pretty sure)

Route::prefix('booking')->middleware('auth')->group(function(){
	Route::get('/create', 'Booking\BookingController@createIndex');
    Route::post('/create', 'Booking\BookingController@create');
	Route::get('/view', 'Booking\BookingController@view');
	Route::get('/search', 'Booking\BookingController@search');
});
//make a booking and the index and search a booking(search not yet implemented 12-23-19)

Route::get('/commandments', 'CommandmentsController@index');
Route::get('/test', 'CommandmentsController@test');
//atc commandments and the upcoming users admission test

Route::prefix('roster')->group(function(){
	Route::get('/index', 'RosterController@index');
	Route::get('/edit/{$id}', 'RosterController@edit');
});
//roster and edit(edit doesn't work)

Route::get('/contact', 'FrontController@contact');
Route::get('/dispatch', 'DispatchController@index');
Route::get('/schedule', 'ScheduleController@index');
Route::get('/staff', 'FrontController@staff');
Route::get('/pdc', 'FrontController@pdc');
//Nav links and pdc is secret! (not really)

Route::post('/search', function(){
     $q = Input::get('q');
     if($q != ' '){
	$user = User::where('name', 'LIKE', '%' . $q . '%')
		->get();
	if(count($user) > 0)
		return view('front.index')->withDetails($user)->withQuery($q);
     		}
		return view('front.index')->withMessage("No Users found!");
});
/*if a user has the proper perms to view they will be able to 
search every user based on if the search query matches a letter in their name
*/

/*
Route::prefix('fly')->middleware('auth')->group(function(){
	Route::get('/booked', 'Flight\FlightController@index');
});
*/
Route::get('/clear-cache', function() {
	Artisan::call('cache:clear');
	return "Cache is cleared";
});
//clears browser cache from vswalife.com
