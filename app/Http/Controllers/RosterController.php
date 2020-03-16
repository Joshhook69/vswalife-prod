<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class RosterController extends Controller
{
    public function index() {
    	$users = User::all();
        return view('roster.index')->with('users', $users);
    }

    public function edit($id){
	$user = User::find($id);
	return view('roster.edit',['user'=> $user]);
    }

    public function update(Request $request, $id){
    	//Retrieve the user and update
        $user = User::find($id);
        if($user != null) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->crew_base = $request->input('crew_base');
            $user->roles = $request->input('roles');
            $user->save(); //persist the data
            return redirect()->route('roster.index')->with('info','User Updated Successfully');
        }else
            return redirect()->route('roster.index')->withErrors(['User not found.']);
	}

	/*public function store(Request $request){
		$user = new User();
		$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	$user->crew_base = $request->input('crew_base');
    	$user->roles = $request->input('roles');
    	$user->save();
	}*/

    public function destroy($id) {
    	$user = User::find($id);
    	$user->delete();
	return redirect()->route('roster.index');
    }
}
