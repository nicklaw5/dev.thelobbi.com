@extends('admin.layouts.admin-default')
	
@section('content')

<div style="clear:both">
	<h2><b>Edit Platform</b></h2>
</div>

	<div class="panel-body">
		{{ Form::open(['method' => 'PUT', 'action' => array('PlatformsController@update', $platform->id)]) }}
			
			@include('admin.alerts.admin-form-errors')

			<!-- PLATFORM NAME -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="name" class="control-label">Platform Name (required)</label>
					{{ Form::text('name', $platform->name, ['class' => 'form-control', 'required', 'placeholder' => 'eg. PlayStation 4']) }}
				</div>
			</div>

			<!-- PLATFORM ABBREVIATION -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="abbreviation" class="control-label">Abbreviation (required)</label>
					{{ Form::text('abbreviation', $platform->abbreviation, ['class' => 'form-control', 'required', 'placeholder' => 'eg. PS4']) }}
				</div>
			</div>

			<!-- DESCRIPTION -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="description" class="control-label">Description (optional)</label>
					{{ Form::textarea('description', $platform->description, ['rows' => '4', 'class' => 'form-control autogrow', 'placeholder' => 'eg. PlayStation 4 is for the players who want to set out on incredible journeys through immersive new worlds and be part of a deeply connected gaming community. With an outstanding line-up of games already available - and many more currently in development - PS4 is the best place to play amazing top-tier blockbusters and innovative indie hits.']) }}
				</div>
			</div>

			<!-- DEVELOPED BY -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="developer" class="control-label">Developer (required)</label>
					{{ Form::select('developer', $companies, $platform->developer_id, ['class' => 'select2', 'required', 'data-allow-clear' => 'true', 'data-placeholder' => 'Select a company...']); }}
				</div>
			</div>

			<!-- WEBSITE LINK -->
			<div class="form-group row">
				<div class="col-lg-3">
					<label for="website" class="control-label">Webiste (optional)</label>
					{{ Form::text('website', $platform->website, ['class' => 'form-control', 'placeholder' => 'eg. http://www.playstation.com/ps4/']) }}
				</div>
			</div>
						
			<!-- SUBMIT -->
			<div style="margin-top:50px;" class="form-group row col-lg-3">
				<button type="submit" class="btn btn-green">Update Platform</button>
			</div>
		
		{{ Form::close() }}
	
	</div>

@stop