<?php

use Illuminate\Support\Facades\Input;
use App\User;
use App\Events\FormSubmitted;
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
//map test
Route::get('/map', 'FrontController@map');

// Defualt auth routes and home page as well as fleet
Route::get('/pusher', function() {
	return view('pusher');
});

Route::get('/sender', function() {
	return view('sender');
});
Route::post('/sender', function() {
	//This is the Post req
	event(new FormSubmitted($text));
	$text = request()->text;
});
/*
Route::prefix('admin')->middleware('auth')->group(function(){
	Route::post('/airports', 'Admin\AirportController@store');
	Route::get('/airports', 'Admin\AirportController@index');
});
Not Implemented im pretty sure^^^
*/
/*
//working right just dangerous for the time being on prod
Route::prefix('email')->group(function(){
	Route::get('/index', 'MailController@index');
});
*/
Route::prefix('airport')->group(function(){
	Route::get('/index', 'Airport\AirportController@index');
});
//list of all airports swa flies to

//Charts
// vswalife.com/charts ->
Route::prefix('charts')->group(function() {
	Route::get('/', 'ChartController@index');
	Route::post('/search', 'ChartController@searchChart');
	Route::get('/afd', 'ChartController@AFDindex');
	Route::post('/afd/search', 'ChartController@searchAFD');
	Route::get('/changes', 'ChartController@ChartChangeindex');
	Route::post('/changes/search', 'ChartController@searchChartChange');
});

//the complicated weather thingy
Route::get('/weather', 'WeatherController@index');
Route::post('/weather/search', 'WeatherController@searchAirport');

Route::prefix('api')->group(function() {
    Route::prefix('schedule')->group(function() {
    Route::get('/arrival/{icao}', 'Api\ScheduleController@searchByArrivalAirport');
    Route::get('/departure/{icao}', 'Api\ScheduleController@searchByDepartureAirport');
    Route::get('/all/{departure}/{arrival}', 'Api\ScheduleController@searchByArrAndDep');
    });
});
//api routes for interfacing with acars client(im pretty sure)

Route::prefix('booking')->middleware('auth')->group(function(){
	Route::get('/index', 'Booking\BookingController@index')->name('booking.index');
	Route::get('/create', 'Booking\BookingController@createIndex');
    	Route::post('/create', 'Booking\BookingController@create');
	Route::get('/view', 'Booking\BookingController@view');
	Route::get('/search', 'Booking\BookingController@search');
});
//make a booking and the index and search a booking(search not yet implemented 12-23-19)

Route::get('/commandments', 'CommandmentsController@index');
Route::get('/test', 'CommandmentsController@test');
//atc commandments and the upcoming users admission test

Route::prefix('roster')->middleware('auth')->group(function(){
	Route::get('/index', 'RosterController@index')->name('roster.index');
	Route::get('/{id}/edit', 'RosterController@edit')->name('roster.edit');
	Route::get('/{id}/delete', 'RosterController@destroy')->name('roster.destroy');
//	Route::get('/email', 'RosterController@email')->name('roster.email');
//only to get the email list for mass mail
	//Route::get('/{id}/update', 'RosterController@update')->name('roster.update');
	Route::post('/{id}/update', 'RosterController@update')->name('roster.update');
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
