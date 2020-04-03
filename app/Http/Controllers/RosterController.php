<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;

class RosterController extends Controller
{
    public function index() {
    	$users = User::all();
        return view('roster.index')->with('users', $users);
    }

    public function edit(Request $request, $id){
	if(Auth::check()){
		if(Auth()->user()->staff >= 1){
			$user = User::find($id);
			if($user != null)
		return view('roster.edit')->with('user', $user);
		}else{
			return redirect('/')->with('error', 'No user found.');
		}
	}
	}

	public function email(){
		$users = User::all();
		return view('roster.email')->with('users', $users);
	}

    public function update(Request $request, $id){
    	//Retrieve the user and update
        $user = User::find($id);
        if(!$request->has(['name', 'email', 'vatsim_cid', 'swa_id', 'crew_base', 'roles'])){
            dd('hooker is a big dummy.');
        }
        if($user != null) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
	    	$user->swa_id = $request->input('swa_id');
	    	$user->vatsim_cid = $request->input('vatsim_cid');
            $user->crew_base = $request->input('crew_base');
            $user->roles = $request->input('roles');
            $user->save(); //persist the data
            return redirect()->route('roster.index')->with('info','User Updated Successfully');
        }else
            return redirect()->route('roster.index')->withErrors(['User not found.']);
	}

	public function store(Request $request){
		$user = new User();
	    $user->name = $request->input('name');
    	$user->email = $request->input('email');
		$user->swa_id = $request->input('swa_id');
		$user->vatsim_cid = $request->input('vatsim_cid');
    	$user->crew_base = $request->input('crew_base');
    	$user->roles = $request->input('roles');
    	$user->save();
	}

    public function destroy($id) {
    	$user = User::find($id);
    	$user->delete();
	return redirect()->route('roster.index');
    }
}