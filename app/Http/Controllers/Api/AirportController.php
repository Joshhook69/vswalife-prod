<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;

class ScheduleController extends Controller
{
    public function searchByArrivalAirport(){
        $flights = Schedule::all()->where('destination', request()->icao);
        return response()->json($flights);
    }

    public function searchByDepartureAirport(){
        $flights = Schedule::all()->where('origin', request()->icao);
        return response()->json($flights);
    }

    public function searchByArrAndDep(){
        $flights = Schedule::all()->where('origin', request()->departure)
            ->where('destination', request()->arrival);
        return response()->json($flights);
    }
}
