@extends('light')
@section('content')
<div class="container" style="margin-top:5%;">
<link rel="stylesheet" type="text/css" href="/assets/css/search.css">
<script src="/assets/js/search.js"></script>
<div class="jumbotron jumbotron-fluid" style="background-color:#F9F9F9;">
  <div class="container">
    <h1 class="display-4" style="text-align:center; margin-top:5%; background-color:#F9F9F9;">Booking</h1>
</div>
</div>
<form autocomplete="off" action="">
    <div class="autocomplete" style="width:300px; margin-left:10%;">
    	<h1 style="text-align:center;">Departure Airport</h1>
      <input id="airport" type="text" name="" placeholder="Airport">
    </div>
    <div class="autocomplete" style="width:300px; margin-left:25%;">
    	<h1 style="text-align:center;">Arrival Airport</h1>
      <input id="jsesbest" type="text" name="" placeholder="Airport">
    </div>
    <input type="submit">
    <script>
      autocomplete(document.getElementById("airport"), destinations);
      autocomplete(document.getElementById("jsesbest"), destinations);
    </script>
  </form>

@endsection
