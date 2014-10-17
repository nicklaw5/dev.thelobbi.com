@extends('admin.layouts.admin-default')
	
@section('content')

<div style="clear:both">
	<h2><b>Edit Company</b></h2>
</div>

	<div class="panel-body">
		{{ Form::open(['method' => 'PUT', 'action' => array('CompaniesController@update', $company->id) ]) }}
			
			@include('admin.alerts.admin-form-errors')

			<!-- COMPANY NAME -->
			<div class="form-group row">
				<div class="col-lg-6">
					<label for="title" class="control-label">Company Name (required)</label>
					{{ Form::text('name', $company->name, ['class' => 'form-control', 'required', 'placeholder' => 'eg. Electronic Arts (EA)']) }}
				</div>
			</div>

			<!-- DESCRIPTION -->
			<div class="form-group row">
				<div class="col-lg-6">
					
					<label for="description" class="control-label">Company Description (optional)</label>	
					{{ Form::textarea('description', $company->description, ['rows' => '4', 'class' => 'form-control autogrow', 'placeholder' => 'eg. Electronic Arts is a leading global interactive entertainment software company. EA delivers games, content and online services for Internet-connected consoles, personal computers, mobile phones and tablets.']) }}
				</div>
			</div>

			<!-- COMPANY SOCIAL LINKS -->
			<div class="form-group row">
				<div class="col-lg-3">
					<label for="website" class="control-label">Webiste (optional)</label>
					{{ Form::text('website', $company->website, ['class' => 'form-control', 'placeholder' => 'eg. http://assassinscreed.ubi.com/']) }}
				</div>
				<div class="col-lg-3">
					<label for="facebook" class="control-label">Facebook (optional)</label>
					{{ Form::text('facebook', $company->facebook, ['class' => 'form-control', 'placeholder' => 'eg. https://www.facebook.com/assassinscreed']) }}
				</div>
			</div>

			<div class="form-group row">

				<div class="col-lg-3">
					<label for="twitter" class="control-label">Twitter (optional)</label>
					{{ Form::text('twitter', $company->twitter, ['class' => 'form-control', 'placeholder' => 'eg. https://twitter.com/assassinscreed']) }}
				</div>
				<div class="col-lg-3">
					<label for="twitch" class="control-label">Twitch (optional)</label>
					{{ Form::text('twitch', $company->twitch, ['class' => 'form-control', 'placeholder' => "eg. http://www.twitch.tv/directory/game/Assassin's%20Creed%3A%20Unity"]) }}
				</div>
			</div>

			<div class="form-group row">
				<div class="col-lg-3">
					<label for="google_plus" class="control-label">Google Plus (optional)</label>
					{{ Form::text('google_plus', $company->google_plus, ['class' => 'form-control', 'placeholder' => 'eg. https://plus.google.com/u/0/+AssassinsCreed/posts']) }}
				</div>
				<div class="col-lg-3">
					<label for="youtube" class="control-label">Youtube (optional)</label>
					{{ Form::text('youtube', $company->youtube, ['class' => 'form-control', 'placeholder' => 'eg. https://www.youtube.com/user/AssassinsCreed']) }}
				</div>
			</div>

			<!-- COPMANY LOGO -->
			<div class="form-group row">
				<div class="col-lg-5">
					<label for="logo" class="control-label">Company Logo (optional)</label>
					{{ Form::text('logo', $company->logo, ['id' => 'logo', 'class' => 'form-control', 'placeholder' => 'Click the button to add some box art.']) }}
				</div>
				<div class="col-lg-1">
					<a style="margin-top:22px;" href="javascript:;" onclick="jQuery('#filemanagerModal').appendTo(body).modal('show');jQuery('#filemanager').attr('src', '/assets/filemanager/dialog.blade.php?type=0&field_id=logo');" class="btn btn-blue">Add Logo</a>
				</div>
			</div>
						
			<!-- SUBMIT -->
			<div style="margin-top:50px;" class="form-group row col-lg-3">
				<button type="submit" class="btn btn-green">Update Company</button>
			</div>
		
		{{ Form::close() }}
	
	</div>

	@include('modals.filemanager-modal')

@stop