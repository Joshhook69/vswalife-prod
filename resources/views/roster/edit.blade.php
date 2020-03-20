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
	  <label for="cid">VATSIM CID:</label>
	  <input type="text" name="vatsim_cid" id="vatsim_cid" class="form-control" require value="{{$user->vatsim_cid}}">
        <div class="form-group">
        	<label for="crew_base">Crew Base:</label>
        	<input type="text" name="crew_base" id="crew_base" class="form-control" required value="{{$user->crew_base}}">
        </div>
        <div class="form-group">
        	<label for="roles">Rank:</label>
        	<input type="text" name="roles" id="roles" class="form-control" required value="{{$user->roles}}">
        </div>
        <input type="hidden" name="id" value = "{{$user->id}}">
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
