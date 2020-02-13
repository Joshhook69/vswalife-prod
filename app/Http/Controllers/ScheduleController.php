<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Schedule;

class ScheduleController extends Controller {

    public function index() {
		if(Auth::check()){
			if(auth()->user()->staff == 1){
				$schedule = Schedule::paginate(30);
				return view('schedule.index')->with('schedule', $schedule);
			}else{
				return redirect('/')->with('msg', 'Unauthorized!');
			}
		}else{
			return redirect('/')->withErrors( 'User not logged in!');
		}
    }
}
