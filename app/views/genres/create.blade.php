@extends('admin.layouts.admin-default')
	
@section('content')

<div style="clear:both">
	<h2><b>Add New Genre</b></h2>
</div>

	<div class="panel-body">
		{{ Form::open(['action' => 'GenresController@store']) }}
			
			@include('admin.alerts.admin-form-errors')

			<!-- GENRE NAME -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="name" class="control-label">Genre Name (required)</label>
					{{ Form::text('name', '', ['class' => 'form-control', 'required', 'placeholder' => 'eg. MMO']) }}
				</div>
			</div>

			<!-- DESCRIPTION -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="description" class="control-label">Description (optional)</label>
					{{ Form::textarea('description', '', ['rows' => '4', 'class' => 'form-control autogrow', 'placeholder' => 'eg. A massively multiplayer online game (also called MMO and MMOG) is a multiplayer video game which is capable of supporting large numbers of players simultaneously.']) }}
				</div>
			</div>
						
			<!-- SUBMIT -->
			<div style="margin-top:50px;" class="form-group row col-lg-3">
				<button type="submit" class="btn btn-green">Save New Genre</button>
			</div>
		
		{{ Form::close() }}
	
	</div>

@stop