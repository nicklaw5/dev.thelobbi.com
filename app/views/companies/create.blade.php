@extends('admin.layouts-new.admin-template')
	
@section('content')

<div class="row">

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">New Company</h6>
			</div>
			<div class="panel-body">
				{{ Form::open(['action' => 'CompaniesController@store']) }}
					
					@include('admin.alerts.admin-form-errors')

					<!-- COMPANY NAME -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="title" class="control-label">Company Name (required)</label>
							{{ Form::text('name', '', ['class' => 'form-control', 'required', 'placeholder' => 'eg. Electronic Arts (EA)']) }}
						</div>
					</div>

					<!-- DESCRIPTION -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="description" class="control-label">Company Description (optional)</label>
							{{ Form::textarea('description', '', ['id' => 'description', 'rows' => '4', 'class' => 'form-control autogrow']) }}
							<script type="text/javascript">
								$(document).ready(function() {
									CKEDITOR.replace( 'description', {
									        customConfig: "{{ URL::asset('assets/js/ckeditor/config-limited.js') }}",
									});
								});
							</script>							
						</div>
					</div>

					<!-- COMPANY SOCIAL LINKS -->
					<div class="form-group row">
						<div class="col-sm-6">
							<label for="website" class="control-label">Webiste (optional)</label>
							{{ Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'eg. http://assassinscreed.ubi.com/']) }}
						</div>
						<div class="col-sm-6">
							<label for="facebook" class="control-label">Facebook (optional)</label>
							{{ Form::text('facebook', '', ['class' => 'form-control', 'placeholder' => 'eg. https://www.facebook.com/assassinscreed']) }}
						</div>
					</div>

					<div class="form-group row">

						<div class="col-sm-6">
							<label for="twitter" class="control-label">Twitter (optional)</label>
							{{ Form::text('twitter', '', ['class' => 'form-control', 'placeholder' => 'eg. https://twitter.com/assassinscreed']) }}
						</div>
						<div class="col-sm-6">
							<label for="twitch" class="control-label">Twitch (optional)</label>
							{{ Form::text('twitch', '', ['class' => 'form-control', 'placeholder' => "eg. http://www.twitch.tv/directory/game/Assassin's%20Creed%3A%20Unity"]) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-6">
							<label for="google_plus" class="control-label">Google Plus (optional)</label>
							{{ Form::text('google_plus', '', ['class' => 'form-control', 'placeholder' => 'eg. https://plus.google.com/u/0/+AssassinsCreed/posts']) }}
						</div>
						<div class="col-sm-6">
							<label for="youtube" class="control-label">Youtube (optional)</label>
							{{ Form::text('youtube', '', ['class' => 'form-control', 'placeholder' => 'eg. https://www.youtube.com/user/AssassinsCreed']) }}
						</div>
					</div>

					<!-- COPMANY LOGO -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="box_art" class="control-label">Company Logo (optional)</label>
							{{ Form::text('logo', '', ['id' => 'logo', 'class' => 'form-control', 'placeholder' => 'eg. http://static.thelobbi.com/uploads/companies/ea-sports-logo.jpg']) }}
						</div>
					</div>
								
					<!-- SUBMIT -->
					<div class="form-group row col-sm-12">
						<button type="submit" class="btn btn-secondary">Add New Company</button>
						<a href="{{ url('admin/companies') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
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

@include('modals.filemanager-modal')

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('assets/js/ckeditor/adapters/jquery.js') }}"></script>
@stop