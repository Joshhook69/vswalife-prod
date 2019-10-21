<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Booking;

class BookingController extends Controller {

    public function index() {
        if(Auth::user()){
            return view('booking.index');
        }else{
            return redirect('/')->withErrors('msg', 'Not Authorized');
        }
    }

    public function getAll() {
        $bookings = Booking::all();
        return response()->json($bookings);
    }

    public function find(Request $request) {
        if (request()->has('booking_id'))
            return $this->getFlightById();
        elseif (request()->has(['origin', 'destination']))
            return $this->getByOriginAndDest();
        elseif (request()->has('origin'))
            return $this->getByOrigin();
        elseif (request()->has('destination'))
            return $this->getByDestination();
        else
            return response()->json([
               'error' => 'Invalid parameters provided. Valid options are: booking_id, origin and destination, or destination and origin individually.'
            ]);
    }

    public function getByOrigin(){
        $booking = Booking::where('origin', '=', request()->get('origin'))->get();
        if(count($booking) > 0)
            return response()->json($booking);
        else
            return response()->json([
                'error' => 'No flights were found using the criteria you provided.'
            ]);
    }

    public function getByDestination(){
        $booking = Booking::where('destination', '=', request()->get('destination'))->get();
        if(count($booking) > 0)
            return response()->json($booking);
        else
            return response()->json([
                'error' => 'No flights were found using the criteria you provided.'
            ]);
    }

    public function getByOriginAndDest() {
        $booking = Booking::where('origin', '=', request()->get('origin'))
            ->where('destination', '=', request()->get('destination'))
            ->get();
        if(count($booking) > 0)
            return response()->json($booking);
        else
            return response()->json([
                'error' => 'No flights were found using the criteria you provided.'
            ]);
    }

    public function getFlightById() {
        $booking = Booking::find(request()->get('booking_id'));
        if ($booking != null)
            return response()->json($booking);
        else
            return response()->json([
                'error' => 'The Booking ID you provided is invalid, or it no longer exists.'
            ]);
    } 
}
