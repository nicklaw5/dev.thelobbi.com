@extends('admin.layouts-new.admin-template')
	
@section('content')

<secttion class="mailbox-env">
				
	<div class="row">
		
		<!-- Compose Email Form -->
		<div class="col-sm-9 mailbox-right">
			
			<div class="mail-compose">
				
				<form method="post" role="form">
				{{ Form::open(['action' => 'MessagesController@store']) }}
				
					<!-- Header Title and Button Options -->
					<div class="mail-header">
						<div class="row">
							<div class="col-sm-6">							
								<h3>
									<i class="linecons-pencil"></i>
									Compose Mail
								</h3>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="recipients">To:</label>
						{{ Form::select('recipients[]', $staff, null, ['required', 'class' => 'select2 form-control', 'multiple']); }}
					</div>
					
					<div class="form-group">
						<label for="subject">Subject:</label>
						<!-- <input type="text" class="form-control" id="subject" tabindex="1" /> -->
						{{ Form::text('subject', '', ['class' => 'form-control', 'tabindex' => '1', 'required', 'autocomplete' => 'off']) }}
					</div>
					
					
					<div class="compose-message-editor">
						<textarea class="form-control wysihtml5" data-html="false" data-color="false" data-stylesheet-url="assets/css/other/wysihtml5-color.css" name="sample_wysiwyg" id="sample_wysiwyg"></textarea>
					</div>
				
					<div class="row">
						<div class="col-sm-3">
							<button type="submit" class="btn btn-secondary btn-block btn-icon btn-icon-standalone">
								<i class="linecons-mail"></i>
								<span>Send</span>
							</button>
						</div>
					</div>
					
				{{ Form::close() }}				
			</div>
			
			
		</div>
		
		@include('admin.layouts.admin-mail-sidebar')
		
	</div>
	
</section>

<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{ URL::asset('assets/js/wysihtml5/src/bootstrap-wysihtml5.css') }}">

<link rel="stylesheet" href="{{ URL::asset('assets/js/select2/select2.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/js/multiselect/css/multi-select.css') }}">

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/wysihtml5/lib/js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ URL::asset('assets/js/wysihtml5/src/bootstrap-wysihtml5.js') }}"></script>

<script src="{{ URL::asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/multiselect/js/jquery.multi-select.js') }}"></script>

@stop