<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers;

class Airport extends Model
{
    protected $table = 'airports';

    protected $fillable = [
    	'icao', 'name_short', 'name_long', 'location', 'country'];
}
