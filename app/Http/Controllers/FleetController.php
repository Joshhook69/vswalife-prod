<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Fleet;
class FleetController extends Controller
{
    public function index() {
    	if(Auth::user()){
    	$fleet = fleet::all();
    	return view('site.fleet')->with('fleet', $fleet);
    }else{
    	return redirect('/')->withErrors(['msg', 'Not Authorized']);
    }
}
}