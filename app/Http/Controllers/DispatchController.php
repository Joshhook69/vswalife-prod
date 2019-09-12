<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DispatchController extends Controller
{
    public function index()
    {
      if(Auth::user()->dispatcher == 1){
     return view('site.dispatch');
   }else{
     return redirect('/')->withErrors(['msg', 'Not Authorized']);
   }
}
}
