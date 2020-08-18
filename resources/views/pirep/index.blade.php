@extends('light')
@section('content')
<div class="container">
	<h4 class="display-4" style="text-align:center; margin-bottom:2%;">Pirep System</h4>
	<form class="form-inline">
		<div class="form-group mx-sm-3 mb-2">
			<label for="dep_apt" class="sr-only">Departure Airport</label>
			<select class="form-control" name="dep_apt" id="dep_apt">
				<option>KDAL</option>
				<option>KHOU</option>
			</select>
		</div>
		<div class="form-group mx-sm-3 mb-2">
			<label for="arr_apt" class="sr-only">Arrival Airport</label>
			<select class="form-control" name="arr_apt" id="arr_apt">
				<option>KDAL</option>
				<option>KHOU</option>
			</select>
		</div>
		<div class="form-group mx-sm-3 mb-2" style="width:50%;">
		<input class="form-control"  name="route" id="route" type="text" placeholder="Route" style="width:50%; margin-top:0%;">
		</div>
	</form>
	<form class="form-inline">
		<div class="form-group mx-sm-3 mb-2">
			<label for="aircraft_type" class="sr-only">Aircraft Type</label>
			<select class="form-control" name="aircraft_type" id="aircraft_type">
				<option>B737</option>
				<option>B738</option>
			</select>
		</div>
		<div class="form-group mx-sm-3 mb-2">
		<input class="form-control" name="fuel_consumed" id="fuel_consumed" type="text" placeholder="Fuel Consumed">
		</div>
		<div class="form-group mx-sm-3 mb-2">
		<input class="form-control" name="cruise_alt" id="cruise_alt" type="text" placeholder="Cruise Alt">
		</div>
		<div class="form-group mx-sm-3 mb-2">
		<input class="form-control" name="landing_rate" id="landing_rate" type="text" placeholder="Landing Rate">
	</div>
	</form>
</div>
@endsection