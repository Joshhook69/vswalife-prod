@extends('light')
@section('content')
<div class="container">
	<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Callsign</th>
      <th scope="col">Origin</th>
      <th scope="col">Destination</th>
      <th scope="col">Route</th>
      <th scope="col">Altitude</th>
      <th scope="col">Planned Duration</th>
    </tr>
  </thead>
  <tbody>
    @foreach($booking as $b)
    <tr>
      <td>SWA{{$b->ident}}</td>
      <td>{{$b->origin}}</td>
      <td>{{$b->destination}}</td>
      <td>{{$b->route}}</td>
      <td>{{$b->altitude}}</td>
      <td>{{$b->air_time}} Minutes</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection