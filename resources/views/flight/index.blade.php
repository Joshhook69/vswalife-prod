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
    @foreach($flight as $fl)
    <tr>
      <td>No callsign yet</td>
      <td>{{$fl->origin}}</td>
      <td>{{$fl->destination}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
