@extends('light')
@section('content')
<div class="container">
{{ Form::open(['action' => ['RosterController@edit', $Users->id], 'method' => 'PUT']) }}
dd(($Users->id));
</div>
@endsection
