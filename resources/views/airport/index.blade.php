@extends('light')
@section('content')
<div class="container">
	<table class="table table-borderless">
		<thead>
			<tr>
				<th scope="col">ICAO</th>
				<th scope="col">Name</th>
				<th scope="col">Country</th>
			</tr>
		</thead>
		<tbody>
			@foreach($airport as $a)
			<tr>
				<td>{{$a->icao}}</td>
				<td>{{$a->name}}</td>
				<td><a href="https://flightaware.com/resources/airport/{{$a->iata}}/procedures">Charts</td>
				<td>{{$a->country}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@endsection
