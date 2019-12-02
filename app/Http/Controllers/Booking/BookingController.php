<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Booking;


class BookingController extends Controller
{
    public function createIndex() {
    	if(Auth::user()){
    		return view('booking.create');
    	}else{
    		return redirect('/')->withErrors('msg', 'Not Authorized');
    	}
    }

    public function creates(Request $request) {
	if($request->has('')) {
		
	}	 
        $booking = new Booking;
	$booking->origin = request()->input('somethinghere');
        $booking->save();
        // return redirect here
    }

    public function create(Request $request) {
	if($request->has(['route', 'origin', 'destination', 'altitude'])) {
        $booking = new App\Booking;
		$booking->route = $request->input('route');
		$booking->origin = $request->input('origin');
		$booking->destination = $request->input('destination');
		$booking->altitude = $request->input('altitude');
		$booking->save();
        //dd($booking);
	}	    
    }
    /*$booking = DB::table('booking')->insertGetId(
        ['$booking->route', ])*/
}
