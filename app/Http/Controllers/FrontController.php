<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class FrontController extends Controller
{
    public function index ()
    {
	return view('front.index');
    }

    public function map(){
    	$client = new Client();
    	$res = $client->request('GET', 'https://api.denartcc.org/live/ZDV');
        $planes = json_decode($res->getBody());
        return view('front.map')->with('planes', $planes);
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

}
