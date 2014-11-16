@extends('admin.layouts-new.admin-template')
	
@section('content')

<div class="row">

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">New Genre</h6>
			</div>
			<div class="panel-body">
				{{ Form::open(['action' => 'GenresController@store']) }}
					
					@include('admin.alerts.admin-form-errors')

					<!-- GENRE NAME -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="name" class="control-label">Genre Name (required)</label>
							{{ Form::text('name', '', ['class' => 'form-control', 'required', 'placeholder' => 'eg. MMO']) }}
						</div>
					</div>

					<!-- DESCRIPTION -->
					<div class="form-group row">
						<div class="col-sm-12">
							<label for="description" class="control-label">Description (optional)</label>
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
								
					<!-- SUBMIT -->
					<div class="form-group row col-sm-12">
						<button type="submit" class="btn btn-secondary">Add New Genre</button>
						<a href="{{ url('admin/genres') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
					</div>
				
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<!-- END .col-sm-6 -->

</div>
<!-- END .row -->

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('assets/js/ckeditor/adapters/jquery.js') }}"></script>

@stop