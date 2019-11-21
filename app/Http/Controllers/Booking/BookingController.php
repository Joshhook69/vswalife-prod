<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Booking;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function create() {
    	if(Auth::user()){
    		return view('booking.create');
    	}else{
    		return redirect('/')->withErrors('msg', 'Not Authorized');
    	}
}
}
