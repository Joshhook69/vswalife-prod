@extends('light')
@section('content')
<div class="container" style="margin-top:5%;">
<link rel="stylesheet" type="text/css" href="/assets/css/search.css">
<script src="/assets/js/search.js"></script>

@php
	$arrival = Request::input('arr');
	$departure = Request::input('dep');
	$alt = Request::input('alt');
	$ident = Request::input('ident');
@endphp

<form method="POST" autocomplete="off" action="/booking/create">
	@csrf
	Route
	<div class="form-group">
		<textarea class="form-control" name="route" id="route"></textarea>
	</div>

	<div class="col-md-4 mb-3">
    	<div class="autocomplete"></div>
      <label for="validationServer01">Callsign</label>
      <input type="text" class="form-control is-valid" id="ident" name="ident" placeholder="Callsign" value="{{$ident}}" readonly>
  	</div>

	<div class="form-row">
    <div class="col-md-4 mb-3">
    	<div class="autocomplete"></div>
      <label for="validationServer01">Origin</label>
      <input type="text" class="form-control is-valid" id="origin" name="origin" placeholder="Origin" value="{{$departure}}" readonly>
  </div>
    <div class="col-md-4 mb-3">
    	<div class="autocomplete"></div>
      <label for="validationServer01">Destination</label>
      <input type="text" class="form-control is-valid" id="destination" name="destination" placeholder="Destination" value="{{$arrival}}" readonly>
  </div>
    <div class="col-md-4 mb-3">
	<div class="autocomplete"></div>
	<label for="validationServer01">Altitude</label>
	<input type="text" class="form-control is-valid" id="altitude" name="altitude" placeholder="altitude" value="{{$alt}}" required>
</div>
	<button class="btn btn-primary" type="submit">Submit</button>
</form>
<script>
	autocomplete(document.getElementById("origin"), destinations);
	autocomplete(document.getElementById("destination"), destinations);
</script>
</div>
@endsection
