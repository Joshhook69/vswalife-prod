@extends('light')
@section('content')
<div class="container">
	<table class="table table-borderless">
		<thead>
			<tr>
				<th scope="col">ICAO</th>
				<th scope="col">Name</th>
				<th scope="col">Weather</th>
				<th scope="col">Charts(U.S.)</th>
				<th scope="col">Country</th>
			</tr>
		</thead>
		<tbody>
			@foreach($airport as $a)
			<tr>
				<td>{{$a->icao}}</td>
				<td>{{$a->name_short}}</td>
				<td style=""><a href="https://vswalife.com/weather?apt={{$a->icao}}">Weather</td>
				<td style=""><a href="https://api.aviationapi.com/v1/charts?apt={{$a->icao}}">Charts</td>
				<td>{{$a->country}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@endsection
