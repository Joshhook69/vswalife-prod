<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Booking;

class BookingController extends Controller
{
    public function index() {
        if(Auth::user()){
	return view('booking.index');
    }else{
	return redirect('/')->withErrors('msg', 'Not Authorized');
}
//    public function create() {
//	if(Auth::user()) {
//     return view('booking.create');
//   }
}
}
