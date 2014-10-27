@extends('admin.layouts.admin-default')
	
@section('content')

<div style="clear:both">
	<h2><b>Edit Video</b></h2>
</div>

	<div class="panel-body">
		{{ Form::open(['method' => 'PUT', 'action' => array('VideosController@update', $video->id)]) }}
			
			@include('admin.alerts.admin-form-errors')

			<!-- VIDEO TITLE -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="title" class="control-label">Video Title (required)</label>
					{{ Form::text('title', $video->title, ['class' => 'form-control', 'required', 'placeholder' => 'eg. E3 2014: Assassin\'s Creed: Unity - Revolution Trailer']) }}
				</div>
			</div>

			<!-- VIDEO DESCRIPTION -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="description" class="control-label">Video Description (required)</label>	
					{{ Form::textarea('description', $video->description, ['required', 'rows' => '3', 'class' => 'form-control autogrow', 'placeholder' => 'eg. Revolution is in the air in Assassin\'s Creed: Unity. Are you ready to write history?']) }}
				</div>
			</div>

			<!-- VIDEO FILE (can be Youtube or own video from CDN) -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="video" class="control-label">Video URL Location (required)</label>
					{{ Form::text('video', $video->video, ['class' => 'form-control', 'placeholder' => 'eg. https://www.youtube.com/watch?v=xzCEdSKMkdU']) }}
				</div>
			</div>

			<!-- VIDEO SHORT (can be Youtube or own video from CDN) -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="video_short" class="control-label">Video Short URL Location (optional)</label>
					{{ Form::text('video_short', $video->video_short, ['class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/videos/short-video.mp4']) }}
				</div>
			</div>			

			<!-- VIDEO COVER IMAGE -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="image" class="control-label">Cover Image URL Location (required)</label>
					{{ Form::text('image', $video->image, ['class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/images/videos/my-image.jpg']) }}
				</div>
			</div>			

			<!-- VIDEO CATEGORY -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="video_category" class="control-label">Video Category (required)</label>
					{{ Form::select('video_category', $video_categories, null, ['class' => 'select2', 'required', 'data-allow-clear' => 'true', 'data-placeholder' => 'Select a category...']); }}
					
				</div>
			</div>

			<!-- TAG GAME(S) -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="games" class="control-label">Game mentioned in this video (required)</label>
					{{ Form::select('game', $games, $video->game_id, ['class' => 'select2', 'required', 'data-allow-clear' => 'true', 'data-placeholder' => 'Select a game...']); }}
				</div>
			</div>

			<!-- SUBMIT -->
			<div style="margin-top:50px;" class="form-group row col-lg-3">
				<button type="submit" class="btn btn-green">Update Video</button>
			</div>
		
		{{ Form::close() }}
	
	</div>

<!-- Modals -->
@include('admin.alerts.on-back-alert')

@stop