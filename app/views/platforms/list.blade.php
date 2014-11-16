@extends('admin.layouts-new.admin-template')
	
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">All Platforms</h3>
		<div class="panel-options">
			<a href="{{ url('admin/platforms/create') }}">
				<button type="button" class="btn btn-primary" style="margin: 0">New Platform</button>
			</a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>Platform Name</th>
					<th>Platform Abbreviation</th>
					<th>Developed By</th>
					<th>Description</th>			
					<th width="165">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($platforms as $platform)
				<tr>
					<td><a href="/platforms/{{ $platform->abbreviation_slug }}">{{ $platform->name }}</a></td>
					<td>{{ $platform->abbreviation }}</td>
					<td>{{ $platform->developer }}</td>
					<td>{{ $platform->description }}</td>
					<td>
						<a style="float:left" href="platforms/{{ $platform->id }}/edit" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
						<button style="float:left; margin-left: 5px;" data-id="{{ $platform->id }}" class="delete-btn btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</button>
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
			$platform_id = $(this).attr('data-id');
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
				        url: '/platforms/' + $platform_id,
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