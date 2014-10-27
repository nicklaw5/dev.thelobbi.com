@extends('admin.layouts.admin-default')
	
@section('content')

<div style="clear:both">
	<h2><b>Add News Article</b></h2>
</div>

	<div class="panel-body">
		{{ Form::open(['action' => 'ArticlesController@store']) }}
			
			@include('admin.alerts.admin-form-errors')

			<!-- ARTICLE CATEGORY -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="article_category" class="control-label">Article Category (required)</label>
					{{ Form::select('article_category', $article_categories, null, ['class' => 'select2', 'required', 'data-allow-clear' => 'true', 'data-placeholder' => 'Select a category...']); }}
					
				</div>
			</div>

			<!-- ARTICLE TITLE -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="title" class="control-label">Article Title (required)</label>
					{{ Form::text('title', '', ['class' => 'form-control', 'required', 'placeholder' => 'eg. E3 2014: Assassin\'s Creed: Unity - Revolution Trailer']) }}
				</div>
			</div>

			<!-- ARTICLE DESCRIPTION -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="description" class="control-label">Article Description (required)</label>	
					{{ Form::textarea('description', '', ['required', 'rows' => '3', 'class' => 'form-control autogrow', 'placeholder' => 'eg. Revolution is in the air in Assassin\'s Creed: Unity. Are you ready to write history?']) }}
				</div>
			</div>

			<!-- ARTICLE BODY -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="body" class="control-label">Article Body (required)</label>
					{{ Form::textarea('body', '', ['required', 'rows' => '3', 'class' => 'form-control autogrow', 'placeholder' => 'eg. Revolution is in the air in Assassin\'s Creed: Unity. Are you ready to write history?']) }}
				</div>
			</div>			

			<!-- REVIEW VIDEO (can be Youtube or own video from CDN) -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="review_video" class="control-label">Review Video (optional)</label>
					{{ Form::select('review_video', $videos, null, ['class' => 'select2', 'required', 'data-allow-clear' => 'true', 'data-placeholder' => 'Select a game...']); }}
				</div>
			</div>

			<!-- REVIEW VIDEO SHORT (can be Youtube or own video from CDN) -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="review_video_short" class="control-label">Article Short URL Location (optional)</label>
					{{ Form::text('review_video_short', '', ['class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/Articles/short-Article.mp4']) }}
				</div>
			</div>

			<!-- ARTICLE MAIN IMAGE -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="main_image" class="control-label">Cover Image URL Location (required)</label>
					{{ Form::text('main_image', '', ['class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/images/Articles/my-image.jpg']) }}
				</div>
			</div>

			<!-- ARTICLE COVER IMAGE -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="cover_image" class="control-label">Cover Image URL Location (required)</label>
					{{ Form::text('main_image', '', ['class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/images/Articles/my-image.jpg']) }}
				</div>
			</div>

			<!-- TAG GAME IN THIS ARTICLE -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="game" class="control-label">Game this artcile related to (required)</label>
					{{ Form::select('game', $games, null, ['class' => 'select2', 'required', 'data-allow-clear' => 'true', 'data-placeholder' => 'Select a game...']); }}
				</div>
			</div>

			<!-- SUBMIT -->
			<div style="margin-top:50px;" class="form-group row col-lg-3">
				<button type="submit" class="btn btn-green">Submit New Article</button>
			</div>
		
		{{ Form::close() }}
	
	</div>

<!-- Modals -->
@include('admin.alerts.on-back-alert')

@stop