<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandmentsController extends Controller
{
    public function index() 
    {
    	return view('site.commandments');
    }
    public function test()
    {
	return view('site.test');
    } 
}
