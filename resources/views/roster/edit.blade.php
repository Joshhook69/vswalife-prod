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
          <label form="cid">VATSIM CID:</label>
          <input type="text" name="vatsim_cid" id="vatsim_cid" class="form-control" required value = "{{$user->vatsim_cid}}" readonly>
        </div>
        <div class="form-group">
          <label for="crew_base">Crew Base:</label>
          <select name="crew_base" id="crew_base" value="crew_base" class="form-control">
          <option value="" id="crew_base" name="crew_base">Choose</option>
          <option value="HQ/NOC" id="crew_base" name="crew_base">HQ/NOC</option>
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
          <input type="text" name="roles" id="roles" class="form-control" required value="{{$user->roles}}">
        </div>
        <input type="hidden" name="id" value = "{{$user->id}}">
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
