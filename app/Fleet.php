<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers;
class Fleet extends Model
{
    protected $table = 'fleet';

    protected $fillable = [
    	'registration', 'model', 'type', 'built', 'delivery', 'status' ];
}
