@extends('light')
@section('title', 'Welcome')
@section('content')
<div class="container">
<div class="jumbotron jumbotron-fluid" style="padding-bottom:0; background-color:#F9F9F9;">
  <div class="container">
    <h1 class="display-4" style="text-align:center;  margin-right:10%; margin-top:5%;">Fleet</h1>
    </div>
  </div>
<div class="container">
<table class="table table-borderless">
  <thead>
    <tr>
        <th scope="col">Registration</th>
        <th scope="col">Model</th>
        <th scope="col">Type</th>
        <th scope="col">SELCAL</th>
        <th scope="col">Built</th>
        <th scope="col">Delivery</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($fleet as $f)
      <tr>
        <td>{{$f->registration}}</td>
        <td>{{$f->model}}</td>
        <td>{{$f->type}}</td>
        <td>{{$f->selcal}}</td>
        <td>{{$f->built}}</td>
        <td>{{$f->delivery}}</td>
        <td>{{$f->status}}</td>
      <tr>
      @endforeach
  </tbody>
</table>
</div>
  @endsection
