<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
	$user = User::find($id);
	return view('roster.edit');
    }
    public function update(Request $request, $id){
	}

    public function destroy($id) {
    	$users = User::findOrFail($id);
    	$users->delete();
    }
}
