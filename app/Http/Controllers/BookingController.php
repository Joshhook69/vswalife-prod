<?php
namespace App\Http\Controllers\flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
class BookingController extends Controller {
    /**
     *
     */
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
    /**
     * @description Parent call for finding bookings.
     * @children getByOrigin, getFlightById, getByOriginAndDest, getByDestination.
     * @route %version%/flight/booking/find
     * @param booking_id ID of a flight.
     * @param origin Origin airport of a flight.
     * @param destination Destination airport of a flight.
     * @notice Origin and destination can be used combined, or separately, while booking_id cannot.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
    /**
     * @description Finds a flight based on the origin airport.
     * @route %version%/flight/booking/find
     * @param origin Origin airport.
     * @notice Do not call this method directly, use the find method above, and it's route.
     * @parent find
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByOrigin(){
        $booking = Booking::where('origin', '=', request()->get('origin'))->get();
        if(count($booking) > 0)
            return response()->json($booking);
        else
            return response()->json([
                'error' => 'No flights were found using the criteria you provided.'
            ]);
    }
    /**
     * @description Find a flight based on the destination airport.
     * @route %version%/flight/booking/find
     * @param destination Destination airport.
     * @notice Do not call this method directly, use the find method above, and it's route.
     * @parent find
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByDestination(){
        $booking = Booking::where('destination', '=', request()->get('destination'))->get();
        if(count($booking) > 0)
            return response()->json($booking);
        else
            return response()->json([
                'error' => 'No flights were found using the criteria you provided.'
            ]);
    }
    /**
     * @description Find a flight based on the origin and destination airport.
     * @route %version%/flight/booking/find
     * @param origin Origin airport
     * @param destination Destination airport.
     * @notice Do not call this method directly, use the find method above, and it's route.
     * @parent find
     * @return \Illuminate\Http\JsonResponse
     */
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
    /**
     * @description Find a flight based on its booking id.
     * @route %version%/flight/booking/find
     * @param booking_id Booking id of a flight.
     * @notice DO not call this method directly, use the find method above, and it's route.
     * @parent find
     * @return \Illuminate\Http\JsonResponse
     */
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
