<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;

class ScheduleController extends Controller
{
    public function searchByArrivalAirport(){
        $schedule = Schedule::all()->where('destination', request()->icao);
        return response()->json($schedule);
    }

    public function searchByDepartureAirport(){
        $schedule = Schedule::all()->where('origin', request()->icao);
        return response()->json($schedule);
    }
}
