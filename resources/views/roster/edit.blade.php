@extends('light')
@section('content')
<div class="container">
	<h1>Edit User</h1>
{!! Form::open(['action' => ['RosterController@update', $user->id], 'method' => 'POST']) !!}
	<div class="form-group">
	{{Form::label('title', 'title')}}
	{{Form::text('Name', $user->name, ['class' => 'form-control', 'placeholder' => 'Title'])}}
	</div>
	<div class="form-group">
	{{Form::label('body', 'Body')}}
	{{Form::textarea('body', $user->email, ['id' => 'article-ckeditor', 'class' => 'form-control',])}}
	</div>
	{{Form::hidden('_method','PUT')}}
	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>
@endsection
