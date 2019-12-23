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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/commandments', 'CommandmentsController@index');
Route::get('/test', 'CommandmentsController@test');

Route::get('/roster', 'RosterController@index');
Route::get('/roster/{$id}/edit', 'RosterController@edit');

Route::get('/contact', 'FrontController@contact');
Route::get('/dispatch', 'DispatchController@index');
Route::get('/schedule', 'ScheduleController@index');
Route::get('/booking', 'BookingController@index');
Route::get('/staff', 'FrontController@staff');
Route::get('/pdc', 'FrontController@pdc');
//Route::get('/airports', 'FrontController@airports');

Route::prefix('airport')->group(function(){
	Route::get('/index', 'Airport\AirportController@index');
});

Route::prefix('booking')->middleware('auth')->group(function(){
	Route::get('/create', 'Booking\BookingController@createIndex');
        Route::post('/create', 'Booking\BookingController@create');
	Route::get('/view', 'Booking\BookingController@view');
});



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

Route::prefix('admin')->middleware('auth')->group(function(){
	Route::post('/airports', 'Admin\AirportController@store');
	Route::get('/airports', 'Admin\AirportController@index');
});

/*
Route::prefix('fly')->middleware('auth')->group(function(){
	Route::get('/booked', 'Flight\FlightController@index');
});
*/

Route::prefix('api')->group(function() {
    Route::prefix('schedule')->group(function() {
        Route::get('/arrival/{icao}', 'Api\ScheduleController@searchByArrivalAirport');
        Route::get('/departure/{icao}', 'Api\ScheduleController@searchByDepartureAirport');
        Route::get('/all/{departure}/{arrival}', 'Api\ScheduleController@searchByArrAndDep');
    });
});
Route::get('/clear-cache', function() {
	Artisan::call('cache:clear');
	return "Cache is cleared";
});
