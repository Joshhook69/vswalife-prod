<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers;

class Airport extends Model
{
    protected $table = 'airports';

    protected $fillable = [
    	'icao', 'iata', 'name', 'location', 'country'];
}
