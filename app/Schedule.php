<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers;
use App\Http\Controllers\Booking;
class Schedule extends Model
{
    protected $table = 'schedule';

    protected $fillable = [
    	'ident', 'departuretime', 'arrivaltime', 'origin', 'destination', 'altitude', 'aircrafttype' 
	];

	public function getDepartureTime() {
	//	$carbon = new \Carbon\Carbon();
	//	$date = $carbon->createFromTimestamp($this->departuretime);
	//	return $date->format('m/d/Y @ H:i');
		return $this->departuretime;
	}

	public function getArrivalTime() {
	//	$carbon = new \Carbon\Carbon();
	//	$date = $carbon->createFromTimestamp($this->arrivaltime);
	//	return $date->format('m/d/Y @ H:i');
		return $this->arrivaltime;
	}

}
