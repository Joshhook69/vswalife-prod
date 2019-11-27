<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Auth;
use DB;
class RosterController extends Controller
{
    public function index() {
    	$users = User::all();
        return view('roster.index')->with('users', $users);
    }

    public function edit($id) {
	$users = User::findOrFail($id);
	return view('roster.edit');
    }

    public function destroy($id) {
    	$users = User::findOrFail($id);
    	$users->delete();
    }
}
