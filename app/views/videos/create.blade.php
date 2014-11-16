@extends('admin.layouts-new.admin-template')
	
@section('content')
<div class="row">

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">New Video</h6>
			</div>

			<div class="panel-body">
				{{ Form::open(['action' => 'VideosController@store']) }}
					
					@include('admin.alerts.admin-form-errors')

					<!-- VIDEO TITLE -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="title" class="control-label">Video Title (required)</label>
							{{ Form::text('title', '', ['class' => 'form-control', 'required', 'placeholder' => 'eg. E3 2014: Assassin\'s Creed: Unity - Revolution Trailer']) }}
						</div>
					</div>

					<!-- VIDEO DESCRIPTION -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="description" class="control-label">Video Description (required)</label>	
							{{ Form::textarea('description', '', ['id' => 'description', 'required', 'rows' => '3', 'class' => 'form-control autogrow', 'placeholder' => 'eg. Revolution is in the air in Assassin\'s Creed: Unity. Are you ready to write history?']) }}

							<script type="text/javascript">
								$(document).ready(function() {
				                	CKEDITOR.replace( 'description', {
									        customConfig: "{{ URL::asset('assets/js/ckeditor/config-limited.js') }}",
									});
				            	});
							</script>
						</div>
					</div>

					<!-- VIDEO FILE (can be Youtube or own video from CDN) -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="video" class="control-label">Video URL Location (required)</label>
							{{ Form::text('video', '', ['class' => 'form-control', 'placeholder' => 'eg. https://www.youtube.com/watch?v=xzCEdSKMkdU']) }}
						</div>
					</div>

					<!-- VIDEO SHORT (can be Youtube or own video from CDN) -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="video_short" class="control-label">Video Short URL Location (optional)</label>
							{{ Form::text('video_short', '', ['class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/videos/short-video.mp4']) }}
						</div>
					</div>			

					<!-- VIDEO COVER IMAGE -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="image" class="control-label">Cover Image URL Location (required)</label>
							{{ Form::text('image', '', ['class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/images/videos/my-image.jpg']) }}
						</div>
					</div>			

					<!-- VIDEO CATEGORY -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="video_category" class="control-label">Video Category (required)</label>
							{{ Form::select('video_category', $video_categories, null, ['class' => 'select2', 'required', 'data-allow-clear' => 'true', 'data-placeholder' => 'Select a category...']); }}
							
						</div>
					</div>

					<!-- TAG GAMES -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="games" class="control-label">Tag Game(s) (optional)</label>
							{{ Form::select('games[]', $games, null, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- TAG PLATFORMS -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="platforms" class="control-label">Tag Platform(s) (optional)</label>
							{{ Form::select('platforms[]', $platforms, null, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- TAG COMPANIES -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="companies" class="control-label">Tag Company(s) (optional)</label>
							{{ Form::select('companies[]', $companies, null, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- TAG GAMING EVENTS -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="events" class="control-label">Tag Event(s) (optional)</label>
							{{ Form::select('events[]', $events, null, ['class' => 'select2', 'multiple']); }}
						</div>
					</div>

					<!-- SUBMIT -->
					<div class="form-group row col-sm-12">
						<button type="submit" class="btn btn-secondary">Submit New Video</button>
						<a href="{{ url('admin/videos') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
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
<!-- END .row -->

<!-- Modals -->
@include('admin.alerts.on-back-alert')

<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{ URL::asset('assets/js/daterangepicker/daterangepicker-bs3.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/select2/select2.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/multiselect/css/multi-select.css') }}">

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('assets/js/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ URL::asset('assets/js/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/multiselect/js/jquery.multi-select.js') }}"></script>

@stop