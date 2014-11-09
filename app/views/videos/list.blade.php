@extends('admin.layouts.admin-default')
	
@section('content')

<div style="clear:both">
	<h2><b>Unpublished Videos</b></h2>
</div>

@if(empty($uVideos))
	<p>There are no unpublished videos.</p>
@else
	<table class="table table-bordered datatable" id="table-1">
		<thead>
			<tr>
				<th width="500">Video Title</th>				
				<th>Video Category</th>
				<th>Posted By</th>
				<th>Dated Posted</th>
				<th>View Count</th>
				<th width="265">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($uVideos as $video)
			<tr>
				<td><a href="javascript:;" onclick="jQuery('#previewModal').appendTo(body).modal('show');jQuery('#frame').attr('src', '{{ $video->url }}');">{{ $video->title }}</a></td>
				
				<td>{{ $video->category }}</td>
				<td>{{ $video->first_name . ' ' . $video->last_name }}</td>
				<td>{{ $video->posted_at }}</td>
				<td>{{ $video->views }}</td>
				<td>
					<a style="float:left" data-id="{{ $video->id }}" class="publish-btn btn btn-success btn-sm btn-icon icon-left"><i class="entypo-publish"></i>Publish</a>
					<a style="float:left; margin-left: 5px;" href="videos/{{ $video->id }}/edit" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
					<button style="float:left; margin-left: 5px;" data-id="{{ $video->id }}" class="delete-btn btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</button>
				</td>
			</tr>
			@endforeach	
		</tbody>
	</table>
@endif

<div style="clear:both">
	<h2><b>Published Videos</b></h2>
</div>

@if(empty($pVideos))
	<p>There are no published videos.</p>
@else
<table class="table table-bordered datatable" id="table-2">
	<thead>
		<tr>
			<th width="500">Video Title</th>			
			<th>Video Category</th>
			<th>Posted By</th>
			<th>Dated Posted</th>
			<th>View Count</th>
			<th width="180">Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($pVideos as $video)
		<tr>
			<td><a target="_blank" href="{{ $video->url }}">{{ $video->title }}</a></td>
			<td>{{ $video->category }}</td>
			<td>{{ $video->first_name . ' ' . $video->last_name }}</td>
			<td>{{ $video->posted_at }}</td>
			<td>{{ $video->views }}</td>
			<td>
				<a style="float:left" data-id="{{ $video->id }}" class="unpublish-btn btn btn-gold btn-sm btn-icon icon-left"><i class="entypo-publish"></i>Unpublish</a>
				<a style="float:left; margin-left: 5px;" href="videos/{{ $video->id }}/edit" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif

<!-- <script src="{{ URL::asset('assets/js/custom/list-functions.js') }}"></script> -->

@if(! empty($uVideos))
	<!-- Modals -->
	@include('modals.preview-modal')
@endif

<script type="text/javascript">	
	$(document).ready(function() {

		//publish video
		$('.publish-btn').click(function() {
			$video_id = $(this).attr('data-id');
			bootbox.dialog({
			  message: "Are you sure you want to publish this video?",
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
			      label: "Publish",
			      className: "btn-success",
			      callback: function() {
			      	$.ajax({
				        url: 'videos/' + $video_id + '/publish',
				        type: 'post',
				        success:function(msg){
				        	location.reload();
				        }
					});
			      }
			    }
			  }
			});
		});

		//unpublish video
		$('.unpublish-btn').click(function() {
			$video_id = $(this).attr('data-id');
			bootbox.dialog({
			  message: "Are you sure you want to unpublish this video?",
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
			      label: "Unpublish",
			      className: "btn-gold",
			      callback: function() {
			      	$.ajax({
				        url: 'videos/' + $video_id + '/unpublish',
				        type: 'post',
				        success:function(msg){
				        	location.reload();
				        }
					});
			      }
			    }
			  }
			});
		});


		//delete video
		$('.delete-btn').click(function() {
			$video_id = $(this).attr('data-id');
			bootbox.dialog({
			  message: "Are you sure you want to delete this video?",
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
				        url: '/videos/' + $video_id,
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