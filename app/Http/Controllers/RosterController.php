<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class RosterController extends Controller
{
    public function index() {
    	$users = User::all();
        return view('roster.index')->with('users', $users);
    }

    public function edit($id)
    {
	$users = User::find($id);
	return view('roster.edit')->with('users', $users);
    }

    public function destroy($id) {
    	$users = User::findOrFail($id);
    	$users->delete();
    }
}
