@extends('admin.layouts-new.admin-template')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">All Games</h3>
		<div class="panel-options">
			<a href="{{ url('admin/games/create') }}">
				<button type="button" class="btn btn-primary" style="margin: 0">New Game</button>
			</a>
		</div>
	</div>
	<div class="panel-body">
		
		<table class="table table-bordered table-striped" id="exampl-2">
			<thead>
				<tr>
					<th>Game Title</th>
					<th>Developer(s)</th>
					<th>Publisher(s)</th>
					<th>Platform(s)</th>			
					<th>Genre(s)</th>
					<th>Release Date(s)</th>
					<th width="137">Actions</th>
				</tr>
			</thead>
			
			<tbody class="middle-align">
				@foreach($games->getCollection() as $game)
				<tr>
					<td><a target="_blank" href="/games/{{ $game->title_slug }}">{{ $game->title }}</a></td>
					<td>{{ $game->developers }}</td>
					<td>{{ ( ! empty($game->publishers))? $game->publishers : '-' }}</td>
					<td>{{ ( ! empty($game->platforms))? $game->platforms : '-' }}</td>
					<td>{{ ( ! empty($game->genres))? $game->genres : '-' }}</td>
					<td>{{ $game->release_date }}</td>
					<td>
						<a style="float:left" href="games/{{ $game->id }}/edit" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
						<button style="float:left; margin-left: 5px;" data-id="{{ $game->id }}" class="delete-btn btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</button>
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $games->links() }}
	</div>
</div>

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/bootbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables/js/jquery.dataTables.min.js') }}"></script>



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
			      className: "btn-primary",
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