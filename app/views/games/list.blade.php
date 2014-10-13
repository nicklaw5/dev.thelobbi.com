@extends('admin.layouts.admin-default')
	

@section('content')

<h2><strong>Games List</strong></h2>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Game Title</th>
			<th>Developer(s)</th>
			<th>Publisher(s)</th>
			<th>Platform(s)</th>			
			<th>Release Date(s)</th>
			<th width="245">Actions</th>
		</tr>
	</thead>
	<tbody>
	@foreach($games as $game)
		<tr>
			<td><a href="{{ $game->id }}">{{ $game->title }}</a></td>
			<td>{{ $game->developers }}</td>
			<td>{{ $game->publishers }}</td>
			<td>{{ $game->platforms }}</td>
			<td>{{ $game->genres }}</td>
			<td>
				<a href="#" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>		
				<a href="#" class="btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</a>
				<a href="#" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-info"></i>View</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<script src="{{ URL::asset('assets/js/custom/list-functions.js') }}"></script>

@stop