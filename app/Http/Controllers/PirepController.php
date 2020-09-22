<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
<<<<<<< HEAD
use Illuminate\Support\Facades\Redirect;
=======
>>>>>>> 1510ab792e16b08054f0ea2069f72fc8bd1756e7
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pirep;

class PirepController extends Controller
{
    public function index(){
    	if(Auth::check()){
    		if(Auth()->user()->can_fly == 1){
    			return view('pirep.index');
    		}else{
<<<<<<< HEAD
    			return redirect('/');
=======
    			return redirect('/')->with('err', 'Not Authorized');
>>>>>>> 1510ab792e16b08054f0ea2069f72fc8bd1756e7
    		}
    	}
    }
}
