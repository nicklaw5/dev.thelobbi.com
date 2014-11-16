@extends('admin.layouts-new.admin-template')
	
@section('content')

<div class="row">

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">New Platform</h6>
			</div>
			<div class="panel-body">
				{{ Form::open(['action' => 'PlatformsController@store']) }}
					
					@include('admin.alerts.admin-form-errors')

					<!-- PLATFORM NAME -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="name" class="control-label">Platform Name (required)</label>
							{{ Form::text('name', '', ['class' => 'form-control', 'required', 'placeholder' => 'eg. PlayStation 4']) }}
						</div>
					</div>

					<!-- PLATFORM ABBREVIATION -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="abbreviation" class="control-label">Abbreviation (required)</label>
							{{ Form::text('abbreviation', '', ['class' => 'form-control', 'required', 'placeholder' => 'eg. PS4']) }}
						</div>
					</div>

					<!-- DESCRIPTION -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="description" class="control-label">Description (optional)</label>
							{{ Form::textarea('description', '', ['id' => 'description', 'class' => 'form-control autogrow', 'placeholder' => 'eg. PlayStation 4 is for the players who want to set out on incredible journeys through immersive new worlds and be part of a deeply connected gaming community. With an outstanding line-up of games already available - and many more currently in development - PS4 is the best place to play amazing top-tier blockbusters and innovative indie hits.']) }}
							<script type="text/javascript">
								$(document).ready(function() {
									CKEDITOR.replace( 'description', {
									        customConfig: "{{ URL::asset('assets/js/ckeditor/config-limited.js') }}",
									});
								});
							</script>
						</div>
					</div>

					<!-- DEVELOPED BY -->
					<div class="form-group row">						
						<div class="col-sm-12">
							<label for="developer" class="control-label">Developer (required)</label>
							{{ Form::select('developer', $companies, null, ['class' => 'select2', 'required', 'data-allow-clear' => 'true', 'data-placeholder' => 'Select a company...']); }}
						</div>
					</div>

					<!-- WEBSITE LINK -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="website" class="control-label">Webiste (optional)</label>
							{{ Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'eg. http://www.playstation.com/ps4/']) }}						
						</div>
					</div>
								
					<!-- SUBMIT -->
					<div class="form-group row col-sm-12">
						<button type="submit" class="btn btn-secondary">Add New Platform</button>
						<a href="{{ url('admin/platforms') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
					</div>
				
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<!-- .col-sm-6 -->

</div>
<!-- .row -->

<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{ URL::asset('assets/js/select2/select2.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/select2/select2-bootstrap.css') }}">

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('assets/js/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2/select2.min.js') }}"></script>
@stop