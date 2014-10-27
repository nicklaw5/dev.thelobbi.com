@extends('admin.layouts.admin-default')
	
@section('content')

<div style="clear:both">
	<h2><b>Genres List</b></h2>
</div>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Genre Name</th>
			<th>Genre Description</th>			
			<th width="165">Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($genres as $genre)
		<tr>
			<td><a href="/genres/{{ $genre->name_slug }}">{{ $genre->name }}</a></td>
			<td>{{ $genre->description }}</td>
			<td>
				<a style="float:left" href="genres/{{ $genre->id }}/edit" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
				<button style="float:left; margin-left: 5px;" data-id="{{ $genre->id }}" class="delete-btn btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<script src="{{ URL::asset('assets/js/custom/list-functions.js') }}"></script>

<script type="text/javascript">	
	$(document).ready(function() {
		$('.delete-btn').click(function() {
			$genre_id = $(this).attr('data-id');
			bootbox.dialog({
			  message: "Are you sure you want to delete this genre?",
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
				        url: '/genres/' + $genre_id,
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