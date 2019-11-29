@extends('light')
@section('content')
<div class="container" style="margin-top:5%;">
<h2 style="text-align:center;">Feature On the Way!</h2>
<img src="/assets/images/loading.gif" style="width:10%; height:10%; background-size:cover; margin-left:45%; border-radius:100px;">


<form method="POST" action="/booking/create">
	@csrf
	Route
	<div class="form-group">
		<textarea class="form-control" name="route"></textarea>	
	</div>
	Origin
	<div class="form-group">
		<textarea class="form-control" name="origin"></textarea>	
	</div>
	Destination
	<div class="form-group">
		<textarea class="form-control" name="destination"></textarea>	
	</div>
	Altitude
	<div class="form-group">
		<textarea class="form-control" name="altitude"></textarea>	
	</div>

	<button class="btn btn-primary" type="submit">Submit</button>
</form>

</div>
@endsection
