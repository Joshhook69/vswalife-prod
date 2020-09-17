@extends('light')
@section('content')
<div class="container">
<div class="jumbotron jumbotron-fluid" style="padding-bottom:0; background-color:#F9F9F9;">
  <div class="container">
    <h1 class="display-4" style="text-align:center;  margin-right:10%; margin-top:5%;">Schedule</h1>
	<small style="">*Times are in zulu time</small>
    </div>
  </div>
<div class="container">
<table class="table table-borderless">
  <thead>
    <tr>
        <th scope="col">Callsign</th>
	<th scope="col">Origin</th>
	<th scope="col">Destination</th>
	<th scope="col">Days</th>
	<th scope="col">Distance</th>
	<th scope="col">Flight Time</th>
	<th scope="col">Departure Time</th>
	<th scope="col">Arrival Time</th>
	<th scope="col">Aircraft Type</th>
	<th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    	@foreach($schedule as $s)
    	<tr>
    		<td><a href="https://flightaware.com/live/flight/SWA{{$s->ident}}">SWA{{$s->ident}}</td>
		    <td>{{$s->origin}}</td>
		    <td>{{$s->destination}}</td>
    		<td>{{$s->days}}</td>
    		<td>{{$s->distance}}</td>
		    <td>{{$s->flight_time}} Minutes</td>
    		<td>{{$s->getDepartureTime()}}</td>
		    <td>{{$s->getArrivalTime()}}</td>
		    <td>{{$s->aircrafttype}}</td>
		    <td><a href="/booking/create?ident={{$s->ident}}&dep={{$s->origin}}&arr={{$s->destination}}&alt={{$s->altitude}}" class="bookbutton">Book<a/></td>
    	</tr>
    	@endforeach
    </tbody>
	{{ $schedule->links() }}
</table>
</div>
@endsection
