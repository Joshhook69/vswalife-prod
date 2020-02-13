<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Schedule;
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
    public function search(){
    	if(Auth::user()){
    		return view('booking.index');
    	}else{
    		return redirect('/')->withErrors('Not Authorized');
    	}
    }

    public function create(Request $request) {
	if($request->has(['ident','route', 'origin', 'destination', 'altitude'])) {
        $booking = new Booking;
		$booking->user_id = auth()->user()->id;
        $booking->ident = $request->input('ident');
		$booking->route = $request->input('route');
		$booking->origin = $request->input('origin');
		$booking->destination = $request->input('destination');
		$booking->altitude = $request->input('altitude');
	//      $booking->air_time = $request->input('air_time');
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
                $booking = Booking::where('user_id', Auth()->user()->id)->get();
            return view('booking.view')->with('booking', $booking);
        }else{
                return redirect('/')->withErrors('Not Authorized');
             }
        }
    }
}
