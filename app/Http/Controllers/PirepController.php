<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
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
    			return redirect('/');
    		}
    	}
    }
}
