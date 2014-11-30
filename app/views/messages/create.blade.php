@extends('admin.layouts-new.admin-template')
	
@section('content')

<secttion class="mailbox-env">
				
	<div class="row">
		
		@include('admin.layouts.admin-mail-sidebar')
		
		<!-- Compose Email Form -->
		<div class="col-sm-9 mailbox-right">
			
			<div class="mail-compose">
				
				{{ Form::open(['action' => 'MessagesController@store']) }}
				
					<!-- Header Title and Button Options -->
					<div class="mail-header">
						<div class="row">
							<div class="col-sm-6">							
								<h3>
									<i class="linecons-pencil"></i>
									New Message
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
						{{ Form::text('subject', null, ['class' => 'form-control', 'tabindex' => '1', 'required', 'autocomplete' => 'on']) }}
					</div>
					
					
					<div class="compose-message-editor">
						{{ Form::textarea('body', null, ['required', 'tabindex' => '1', 'class' => 'form-control wysihtml5', 'data-html' => 'false', 'data-color' => 'false', 'data-stylesheet-url' => URL::asset('assets/css/other/wysihtml5-color.css') ]) }}
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