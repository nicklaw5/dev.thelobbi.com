@extends('admin.layouts.admin-default')

@section('content')
<div style="clear:both">
	<h2><strong>Games List</strong></h2>
</div>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Game Title</th>
			<th>Developer(s)</th>
			<th>Publisher(s)</th>
			<th>Platform(s)</th>			
			<th>Genre(s)</th>
			<th>Release Date(s)</th>
			<th width="165">Actions</th>
		</tr>
	</thead>
	<tbody>
	@foreach($games as $game)
		<tr>
			<td><a target="_blank" href="/games/{{ $game->title_slug }}">{{ $game->title }}</a></td>
			<td>{{ $game->developers }}</td>
			<td>{{ $game->publishers }}</td>
			<td>{{ $game->platforms }}</td>
			<td>{{ $game->genres }}</td>
			<td>{{ $game->release_date }}</td>
			<td>
				<a style="float:left" href="games/{{ $game->id }}/edit" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
				<button style="float:left; margin-left: 5px;" data-id="{{ $game->id }}" class="delete-btn btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</button>
				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<script src="{{ URL::asset('assets/js/custom/list-functions.js') }}"></script>

<script type="text/javascript">	
	$(document).ready(function() {
		$('.delete-btn').click(function() {
			$game_id = $(this).attr('data-id');
			bootbox.dialog({
			  message: "Are you sure you want to delete this game?",
			  title: "Confirmation",
			  buttons: {
			    danger: {
			      label: "Cancel",
			      className: "btn-default",
			      callback: function() {
			    	// do nothing
			      }
			    },
			    success: {
			      label: "Delete",
			      className: "btn-danger",
			      callback: function() {
			      	$.ajax({
				        url: '../games/' + $game_id,
				        type: 'post',
				        data: {_method: 'delete'},
				        success:function(msg){
				        	location.reload();
				        }
					});
			      }
			    }
			  }
			});
		});
	});
</script>

@stop