@extends('master')
@section('content')
<div class="container" style="margin-top:15%;">
	<h1 style="text-align:center; color:white;"> Dope stuff for vSWALife Coming Soon !</h1>
	<h3 style="text-align:center; padding-top:5%; color:white"><a href="https://flightaware.com/live/fleet/SWA" 
		target="_blank" style="color:white; text-decoration:underline;"> Live Southwest Airlines Operations</a></h3>
@auth
@if(Auth::user()->staff >= 1)
<form action="{{URL::to('/search')}}" method="POST" role="search">
	{{ csrf_field() }}
	<div class="input-group">
	<input type="text" class="form-control" name="q"
		placeholder="Not my best work but just playing with stuff"> <span class="input-group-btn">
		<button type="submit" class="btn btn-default">
		</button>
		</span>
	</div>
	</form>
@endif
@endauth
	@if(isset($details))
	<p>The Search results for your query <b> {{ $query }} </b> are:</p>
	<h2>Sample user details</h2>
	<table class="table table-borderless">
		<thead>
		   <tr>
		     <th>Name</th>
		   </tr>
		</thead>
		<tbody>
		@foreach($details as $user)
		 <tr style="color:white;">
		    <td>{{$user->name}}</td>
		 </tr>
		@endforeach
		</tbody>
	</table>
	@elseif(isset($message))
	<p>{{ $message }}</p>
	@endif
	<h3 style="text-align:center; color:white;">Would you like to help us stay on track for a record year? <br> Donate here</h3>
	<br>
	<h5 style="text-align:center; color:white;">Wallet Address: 1az3uefj51uSBJ4aozKL7uPYugdVi31DX </h5>
</div>
@endsection
