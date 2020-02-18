@extends('light')
@section('content')
<div class="container">
	<table class="table table-borderless">
		<thead>
			<tr>
				<th scope="col">ICAO</th>
				<th scope="col">Name</th>
				<th scope="col">Weather</th>
				<th scope="col"></th>
				<th scope="col">Country</th>
			</tr>
		</thead>
		<tbody>
			@foreach($airport as $a)
			<tr>
				<td>{{$a->icao}}</td>
				<td>{{$a->name}}</td>
				<td style="padding-right:10%;"><a href="https://api.aviationapi.com/v1/weather/metar?apt={{$a->iata}}">Weather</td>
				<td style="padding-right:10%;"><a href="https://api.aviationapi.com/v1/charts?apt={{$a->iata}}">Charts</td>
				<td>{{$a->country}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@endsection
