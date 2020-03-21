@extends('light')
@section('title','Edit User')
@section('content')
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('roster.update', ['id' => $user->id])}}" method = "post">
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name = "name" id = "name" class="form-control" required value = "{{$user->name}}">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name = "email" id = "email" class="form-control" required value = "{{$user->email}}">
        </div>
	<div class="form-group">
	  <label for="swa_id">WN ID:</label>
	  <input type="text" name="swa_id" id="swa_id" class="form-control" required value="{{$user->swa_id}}">
	</div>
        <div class="form-group">
          <label form="cid">VATSIM CID:</label>
          <input type="text" name="vatsim_cid" id="vatsim_cid" class="form-control" required value = "{{$user->vatsim_cid}}" readonly>
        </div>
        <div class="form-group">
          <label for="crew_base">Crew Base:</label>
          <select name="crew_base" id="crew_base" value="crew_base" class="form-control">
            <option value="{{$user->crew_base}}" id="crew_base" name="crew_base">{{$user->crew_base}}</option>
            <option value="HQ/NOC" id="crew_base" name="crew_base">HQ/NOC</option>
	    <option value="ATL" id="crew_base" name="crew_base">ATL</option>
            <option value="BWI" id="crew_base" name="crew_base">BWI</option>
            <option value="MDW" id="crew_base" name="crew_base">MDW</option>
            <option value="DAL" id="crew_base" name="crew_base">DAL</option>
            <option value="DEN" id="crew_base" name="crew_base">DEN</option>
            <option value="HOU" id="crew_base" name="crew_base">HOU</option>
            <option value="LAS" id="crew_base" name="crew_base">LAS</option>
            <option value="LAX" id="crew_base" name="crew_base">LAX</option>
            <option value="OAK" id="crew_base" name="crew_base">OAK</option>
            <option value="MCO" id="crew_base" name="crew_base">MCO</option>
            <option value="PHX" id="crew_base" name="crew_base">PHX</option>
          </select>
        </div>
        <div class="form-group">
          <label for="roles">Rank:</label>
          <select name="roles" id="roles" value="roles" class="form-control">
            <option value="{{$user->roles}}" id="roles" name="roles">{{$user->roles}}</option>
	    <option value="CEO" id="roles" name="roles">CEO</option>
	    <option value="CTO" id="roles" name="roles">CTO</option>
            <option value="TRAINEE" id="roles" name="roles">TRAINEE</option>
            <option value="IOE" id="roles" name="roles">IOE</option>
            <option value="CIT" id="roles" name="roles">CIT</option>
            <option value="IOE CA" id="roles" name="roles">IOE CA</option>
            <option value="LINE CAPT" id="roles" name="roles">LINE CAPT</option>
            <option value="CHECK AIRMAN" id="roles" name="roles">CHECK AIRMAN</option>
            <option value="CHIEF PILOT" id="roles" name="roles">CHIEF PILOT</option>
            <option value="VP FLT OPS" id="roles" name="roles">VP FLT OPS</option>
          </select>
        </div>
	<div class="form-check">
  	<input class="form-check-input" type="checkbox" value="dispatcher" id="dispatcher">
  	<label class="form-check-label" for="dispatcher">
    	Dispatcher
  	</label>
	</div>
        <input type="hidden" name="id" value = "{{$user->id}}">
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
