<?php

namespace App\Http\Controllers\Airport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Airport;

class AirportController extends Controller
{
    public function index(){
    	$apt = Airport::all();
    	return view('airport.index')->with('airport', $apt);
    }
}
