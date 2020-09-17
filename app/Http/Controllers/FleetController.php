<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Respose;
use App\Fleet;

class FleetController extends Controller
{
    public function index() {
    	if(Auth::user()){
    	$fleet = Fleet::paginate(30);
    	return view('site.fleet')->with('fleet', $fleet);
    }else{
    	return redirect('/')->withErrors('message', 'Not Authorized');
    }
}
}
