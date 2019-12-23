<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Airport;

class FrontController extends Controller
{
    public function index ()
    {
	return view('front.index');
    }

    public function contact ()
    {
	return view('site.contact');
    }

    public function staff ()
    {
	return view('site.staff');
    }
    public function pdc	()
    {
    if(Auth::user()){
	return view('site.pdc');
    }else{
	return redirect('/')->withErrors('Not Authorized');
    }
}


    public function airports (){
        return view('site.airports');
    }
}
