@extends('admin.layouts-new.admin-template')
	
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">All Events</h3>
		<div class="panel-options">
			<a href="{{ url('admin/events/create') }}">
				<button type="button" class="btn btn-primary" style="margin: 0">New Event</button>
			</a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>Event Name</th>
					<th>Description</th>
					<th>Start & End Dates</th>
					<th width="165">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($events as $event)
				<tr>
					<td><a href="/events/{{ $event->event_slug }}">{{ $event->event }}</a></td>
					<td>{{ $event->description }}</td>
					<td>{{ $event->start_date." - ".$event->end_date }}</td>
					<td>
						<a style="float:left" href="events/{{ $event->id }}/edit" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
						<button style="float:left; margin-left: 5px;" data-id="{{ $event->id }}" class="delete-btn btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/bootbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables/js/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">	
	$(document).ready(function() {
		$('.delete-btn').click(function() {
			$event_id = $(this).attr('data-id');
			bootbox.dialog({
			  message: "Are you sure you want to delete this platform?",
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
				        url: '/events/' + $event_id,
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