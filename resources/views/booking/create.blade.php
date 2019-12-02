@extends('light')
@section('content')
<div class="container" style="margin-top:5%;">
<link rel="stylesheet" type="text/css" href="/assets/css/search.css">
<script src="/assets/js/search.js"></script>

<form method="POST" autocomplete="off" action="/booking/create">
	@csrf
	Rotue
	<div class="form-group">
		<textarea class="form-control" name="route" id="route"></textarea>	
	</div>

	<div class="form-row">
    <div class="col-md-4 mb-3">
    	<div class="autocomplete"></div>
      <label for="validationServer01">Origin</label>
      <input type="text" class="form-control is-valid" id="origin" name="origin" placeholder="Origin" value="" required>
  </div>
    <div class="col-md-4 mb-3">
    	<div class="autocomplete"></div>
      <label for="validationServer01">Destination</label>
      <input type="text" class="form-control is-valid" id="destination" name="destination" placeholder="Destination" value="" required>
  </div>
</div>	
	Altitude
	<div class="form-group">
		<textarea class="form-control" id="altitude" name="altitude"></textarea>	
	</div>

	<button class="btn btn-primary" type="submit">Submit</button>
</form>
<script>
	autocomplete(document.getElementById("origin"), destinations);
	autocomplete(document.getElementById("destination"), destinations);
</script>
</div>
@endsection
