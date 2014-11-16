@extends('admin.layouts-new.admin-template')
	
@section('content')

<div class="row">

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">New Video</h6>
			</div>
			<div class="panel-body">
				{{ Form::open(['method' => 'PUT', 'action' => array('ArticlesController@update', $article->id) ]) }}
					
					@include('admin.alerts.admin-form-errors')

					<!-- ARTICLE CATEGORY -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="article_category" class="control-label">Article Category (required)</label>
							{{ Form::select('article_category', $article_categories, $article->article_category, ['id' => 'article_category', 'class' => 'select2', 'required', 'data-allow-clear' => 'true', 'data-placeholder' => 'Select a category...']); }}					
						</div>
					</div>

					<!-- ARTICLE TITLE -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="title" class="control-label">Article Title (required)</label>
							{{ Form::text('title', $article->title, ['class' => 'form-control', 'required', 'placeholder' => 'eg. E3 2014: Assassin\'s Creed: Unity - Revolution Trailer']) }}
						</div>
					</div>

					<!-- ARTICLE DESCRIPTION -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="description" class="control-label">Article Description (required)</label>	
							{{ Form::textarea('description', $article->description, ['id' => 'description', 'required', 'rows' => '3', 'class' => 'form-control autogrow', 'placeholder' => 'eg. Revolution is in the air in Assassin\'s Creed: Unity. Are you ready to write history?']) }}
						</div>
					</div>

					<!-- ARTICLE BODY -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="body" class="control-label">Article Body (required)</label>
							{{ Form::textarea('body', $article->body, ['id' => 'body', 'required', 'rows' => '3', 'class' => 'form-control autogrow ckeditor', 'placeholder' => 'eg. Revolution is in the air in Assassin\'s Creed: Unity. Are you ready to write history?']) }}
							<script type="text/javascript">
								$(document).ready(function() {
				
									CKEDITOR.replace( 'description', {
									        customConfig: "{{ URL::asset('assets/js/ckeditor/config-limited.js') }}",
									});

									CKEDITOR.replace( 'body', {
									        customConfig: "{{ URL::asset('assets/js/ckeditor/config-main.js') }}",
									});
								});
							</script>
						</div>
					</div>			

					<!-- REVIEW SCORE -->
					<div class="form-group row review-score-container">
						<div class="col-sm-12">
							<label for="review_score" class="control-label">Review Score (required) (must be between 0-10)</label>
							{{ Form::text('review_score', $article->review_score, ['id' => 'review_score', 'class' => 'form-control', 'placeholder' => 'eg. 7.8']) }}
						</div>
					</div>

					<!-- VIDEO CHECKBOX -->
					<div class="form-group row video-checkbox">
						<div class="col-sm-12">
							<div class="checkbox">
								<label>
									@if($article->video === null)
										{{ Form::checkbox('chkbox-video', 'value', false, ['id' => 'chkbox-video']) }}
									@else
										{{ Form::checkbox('chkbox-video', 'value', true, ['id' => 'chkbox-video']) }}
									@endif
									<h4>This article relates to a video.</h4>
								</label>
							</div>
						</div>
					</div>

					<!-- ARTICLE VIDEO (can be Youtube or own video from CDN) -->
					<div class="form-group row video-container">
						<div class="col-sm-12">
							<label for="video" class="control-label">Article Video (required)</label>
							{{ Form::select('video', $videos, $article->video, ['id' => 'video', 'class' => 'select2', 'data-allow-clear' => 'true', 'data-placeholder' => 'Select a video...']); }}
						</div>
					</div>

					<!-- MAIN IMAGE -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="image" class="control-label">Main Image URL (required)</label>
							{{ Form::text('main_image', $article->main_image, ['class' => 'form-control', 'required', 'placeholder' => 'eg. http://static.thelobbi.com/images/uploads/1415082277/my-image.jpg']) }}
						</div>
					</div>

					<!-- FEATURE IMAGE -->
					<div class="form-group row feature-image-container">
						<div class="col-sm-12">
							<label for="image" class="control-label">Cover Image URL (required)</label>
							{{ Form::text('feature_image', $article->feature, ['id' => 'feature_image', 'class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/images/uploads/1415082277/my-image.jpg']) }}
						</div>
					</div>

					<!-- TAG GAMES -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="games" class="control-label">Tag Game(s) (optional)</label>
							{{ Form::select('games[]', $games, $game_tags, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- TAG PLATFORMS -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="platforms" class="control-label">Tag Platform(s) (optional)</label>
							{{ Form::select('platforms[]', $platforms, $platform_tags, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- TAG COMPANIES -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="companies" class="control-label">Tag Company(s) (optional)</label>
							{{ Form::select('companies[]', $companies, $company_tags, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- TAG GAMING EVENTS -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="events" class="control-label">Tag Event(s) (optional)</label>
							{{ Form::select('events[]', $events, $event_tags, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- SUBMIT -->
					<div class="form-group row col-sm-12">
						<button type="submit" class="btn btn-secondary">Update Article</button>
						<a href="{{ url('admin/articles') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
					</div>
				
				{{ Form::close() }}
	
			</div>
		</div>
	</div>
	<!-- END .col-sm-6 -->

	<!-- FILE UPLOAD -->
	<div class="col-sm-6">
		@include('admin.layouts.admin-file-upload')
	</div>
	<!-- END .col-sm-6 -->

</div>

<!-- Modals -->
@include('admin.alerts.on-back-alert')

<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{ URL::asset('assets/js/select2/select2.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/multiselect/css/multi-select.css') }}">

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/article-create.js') }}"></script>
<script src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('assets/js/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/multiselect/js/jquery.multi-select.js') }}"></script>


@stop