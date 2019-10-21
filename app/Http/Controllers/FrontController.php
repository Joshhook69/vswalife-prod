<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
