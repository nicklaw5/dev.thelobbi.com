@extends('admin.layouts-new.admin-template')
	
@section('content')

<div class="row">

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Edit Event</h6>
			</div>
			<div class="panel-body">
				{{ Form::open(['method' => 'PUT', 'action' => array('GamingEventsController@update', $event->id)]) }}
					
					@include('admin.alerts.admin-form-errors')

					<!-- EVENT NAME -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="title" class="control-label">Event Name (required)</label>
							{{ Form::text('event', $event->event, ['class' => 'form-control', 'required', 'placeholder' => 'eg. E3 2014']) }}
						</div>
					</div>

					<!-- EVENT DESCRIPTION -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="description" class="control-label">Event Description (optional)</label>	
							{{ Form::textarea('description', $event->description, ['id' => 'description', 'rows' => '4', 'class' => 'form-control autogrow', 'placeholder' => 'eg. E3 (or Electronic Entertainment Expo) is the must-attend event where the video game industry unites to debut, showcase, and experience the future of games.']) }}
							<script type="text/javascript">
								$(document).ready(function() {
									CKEDITOR.replace( 'description', {
									        customConfig: "{{ URL::asset('assets/js/ckeditor/config-limited.js') }}",
									});
								});
							</script>
						</div>
					</div>

					<!-- EVENT SOCIAL LINKS -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="website" class="control-label">Event Webiste (optional)</label>
							{{ Form::text('website', $event->website, ['class' => 'form-control', 'placeholder' => 'eg. http://assassinscreed.ubi.com/']) }}
						</div>
					</div>

					<!-- EVENT DATES -->
					<div class="form-group row">	
						<div class="form-group col-sm-6">
							<label class="control-label">Event Start Date (required)</label>					
							<div class="input-group">
								{{ Form::text('start_date', $event->start_date, ['required', 'class' => 'form-control datepicker', 'data-start-view' => '1', 'data-format' => 'dd MM yyyy']) }}
								<div class="input-group-addon">
									<a href="#"><i class="linecons-calendar"></i></a>
								</div>
							</div>
						</div>
						<div class="form-group col-sm-6">
							<label class="control-label">Event End Date (required)</label>					
							<div class="input-group">
								{{ Form::text('end_date', $event->end_date, ['required', 'class' => 'form-control datepicker', 'data-start-view' => '1', 'data-format' => 'dd MM yyyy']) }}
								<div class="input-group-addon">
									<a href="#"><i class="linecons-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>
								
					<!-- SUBMIT -->
					<div class="form-group row col-sm-12">
						<button type="submit" class="btn btn-secondary">Update Event</button>
						<a href="{{ url('admin/events') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
					</div>
				
				{{ Form::close() }}
			
			</div>
		</div>
	</div>
	<!-- END .col-sm-6 -->

</div>
<!-- END .row -->

<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{ URL::asset('assets/js/daterangepicker/daterangepicker-bs3.css') }}">

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('assets/js/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ URL::asset('assets/js/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/datepicker/bootstrap-datepicker.js') }}"></script>

@stop