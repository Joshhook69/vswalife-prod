<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Booking;
use App\User;


class BookingController extends Controller
{
    public function createIndex() {
    	if(Auth::user()){
    		return view('booking.create');
    	}else{
    		return redirect('/')->withErrors('Not Authorized');
    	}
    }

    /*
	public function creates(Request $request) {
	if($request->has('')) {
		
	}	 
        $booking = new Booking;
	$booking->origin = request()->input('somethinghere');
        $booking->save();
        // return redirect here
    }
   */

    public function create(Request $request) {
	if($request->has(['route', 'origin', 'destination', 'altitude'])) {
        	$booking = new Booking;
		$booking->user_id = auth()->user()->id;
		$booking->route = $request->input('route');
		$booking->origin = $request->input('origin');
		$booking->destination = $request->input('destination');
		$booking->altitude = $request->input('altitude');
		$booking->save();
		return redirect()->back();
       // dd($booking);
	}else{
		return redirect()->back()->withErrors('Form does not have all required elements');
	}
    }
    /*$booking = DB::table('booking')->insertGetId(
        ['$booking->route', ])*/

    public function view(){
        if(Auth::check()){
            if(Auth()->user()->can_fly >= 1){
                $booking = Booking::all();
            return view('booking.view')->with('booking', $booking);
        }else{
                return redirect('/')->withErrors('Not Authorized');
             }
        }
    }
}
