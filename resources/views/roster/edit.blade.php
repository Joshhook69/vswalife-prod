@extends('light')
@section('title','Edit Employee')
@section('content')
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('roster.update')}}" method = "post">
        @csrf
        <div class="form-group">
          <label for="firstname">Name:</label>
          <input type="text" name = "name" id = "name" class="form-control" required value = "{{$user->name}}">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name = "email" id = "email" class="form-control" required value = "{{$user->email}}">
        </div>
        <input type="hidden" name="id" value = "{{$user->id}}">
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
