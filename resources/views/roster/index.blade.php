@extends('light')
@section('content')
<div class="container">
<div class="jumbotron jumbotron-fluid" style="background-color:#f8fafc;">
</div>
	<table class="table table-borderless">
		<thead>
			<tr>
				<th>Name</th>
				<th>WN ID</th>
				<th>Crew Base</th>
				<th>Rank</th>
			@auth
			@if(Auth::user()->staff == 2)
				<th>CID</th>
			@endif
			@endauth
			</tr>
		</thead>
		<tbody>
			@foreach($users as $u)
				<tr>
					<td>{{$u->name}}</td>
					<td style="padding-right:10px;">{{$u->swa_id}}</td>
					<td>{{$u->crew_base}}</td>
					<td>{{$u->roles}}</td>
			@auth
			@if(Auth::user()->staff == 2)
					<td>{{$u->vatsim_cid}}</td>
					<td><a href="/roster/{{$u->id}}/edit" style="display:inline-block;" class="btn btn-success btn-xs simple-tooltip" title="Edit"><i class="far fa-edit"></i></a>
				    	<a href="/roster/{{$u->id}}/delete" style="display:inline-block;" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs simple-tooltip" title="Delete"><i class="fa fa-times"></i></a>
			@endif
			@endauth
		       		       </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@endsection
</div>
</div>
