@extends('admin.layouts-new.admin-template')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Unpublished Articles</h3>
		<div class="panel-options">
			<a href="{{ url('admin/articles/create') }}">
				<button type="button" class="btn btn-primary" style="margin: 0">New Article</button>
			</a>
		</div>
	</div>
	<div class="panel-body">
		@if(empty($uArticles))
			<p>There are no unpublished articles.</p>
		@else
		<table class="table table-bordered table-striped" id="example-1">
			<thead>
				<tr>
					<th width="500">Article Title</th>				
					<th>Article Category</th>
					<th>Posted By</th>
					<th>Dated Posted</th>
					<th>View Count</th>
					<th width="265">Actions</th>
				</tr>
			</thead>
			
			<tbody class="middle-align">
				@foreach($uArticles as $article)
				<tr>
					<td><a href="javascript:;" onclick="jQuery('#previewModal').appendTo(body).modal('show');jQuery('#frame').attr('src', '{{ $article->url }}');">{{ $article->title }}</a></td>
					<td>{{ $article->category }}</td>
					<td>{{ $article->first_name . ' ' . $article->last_name }}</td>
					<td>{{ $article->posted_at }}</td>
					<td>{{ $article->views }}</td>
					<td>
						<a style="float:left" data-id="{{ $article->id }}" class="publish-btn btn btn-success btn-sm btn-icon icon-left"><i class="entypo-publish"></i>Publish</a>
						<a style="float:left; margin-left: 5px;" href="articles/{{ $article->id }}/edit" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
						<button style="float:left; margin-left: 5px;" data-id="{{ $article->id }}" class="delete-btn btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</button>
					</td>
				</tr>
				@endforeach	
			</tbody>
		</table>
		@endif
	</div>
</div>


<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Published Articles</h3>
	</div>
	<div class="panel-body">
		@if(empty($pArticles))
			<p>There are no published articles.</p>
		@else
		<table class="table table-bordered table-striped" id="example-2">
			<thead>
				<tr>
					<th width="500">Article Title</th>			
					<th>Article Category</th>
					<th>Posted By</th>
					<th>Dated Posted</th>
					<th>View Count</th>
					<th width="180">Actions</th>
				</tr>
			</thead>
			
			<tbody class="middle-align">
				@foreach($pArticles as $article)
				<tr>
					<td><a target="_blank" href="{{ $article->url }}">{{ $article->title }}</a></td>
					<td>{{ $article->category }}</td>
					<td>{{ $article->first_name . ' ' . $article->last_name }}</td>
					<td>{{ $article->posted_at }}</td>
					<td>{{ $article->views }}</td>
					<td>
						<a style="float:left" data-id="{{ $article->id }}" class="unpublish-btn btn btn-secondary btn-sm btn-icon icon-left"><i class="entypo-publish"></i>Unpublish</a>
						<a style="float:left; margin-left: 5px;" href="articles/{{ $article->id }}/edit" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
					</td>
				</tr>
				@endforeach	
			</tbody>
		</table>
		@endif
	</div>
</div>

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/bootbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables/js/jquery.dataTables.min.js') }}"></script>


@if(! empty($uArticles))
	<!-- Modals -->
	@include('modals.preview-modal')
@endif

<script type="text/javascript">	
	$(document).ready(function() {

		//publish article
		$('.publish-btn').click(function() {
			$article_id = $(this).attr('data-id');
			bootbox.dialog({
			  message: "Are you sure you want to publish this article?",
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
			      label: "Publish",
			      className: "btn-success",
			      callback: function() {
			      	$.ajax({
				        url: 'articles/' + $article_id + '/publish',
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

		//unpublish article
		$('.unpublish-btn').click(function() {
			$article_id = $(this).attr('data-id');
			bootbox.dialog({
			  message: "Are you sure you want to unpublish this article?",
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
			      label: "Unpublish",
			      className: "btn-success",
			      callback: function() {
			      	$.ajax({
				        url: 'articles/' + $article_id + '/unpublish',
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

		//delete article
		$('.delete-btn').click(function() {
			$article_id = $(this).attr('data-id');
			bootbox.dialog({
			  message: "Are you sure you want to delete this article?",
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
				        url: '/articles/' + $article_id,
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