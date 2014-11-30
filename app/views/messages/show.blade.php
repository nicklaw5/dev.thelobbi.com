@extends('admin.layouts-new.admin-template')
	
@section('content')

<section class="mailbox-env">
				
	<div class="row">

		@include('admin.layouts.admin-mail-sidebar')
		
		<!-- Email Single -->
		<div class="col-sm-9 mailbox-right">
			
			<div class="mail-single">
				
				<!-- Email Title and Button Options -->
				<div class="mail-single-header">
					<h2>
						{{ $message->subject }}
						
						<a href="{{ url('admin/messages') }}" class="go-back">
							<i class="fa-angle-left"></i>
							Back to Inbox
						</a>
					</h2>
					
					<div class="mail-single-header-options">
						<a href="mailbox-compose.html" class="btn btn-primary btn-icon">
							<span>Reply</span>
							<i class="fa-reply-all"></i>
						</a>
						
						<a href="#" id="deleteBtn" class="btn btn-primary btn-icon">
							<input class="cbr" hidden checked type="checkbox" data-id="{{ $message->id }}">
							<i class="fa-trash"></i>
						</a>
					</div>
				</div>
				
				<!-- Email Info From/Reply -->
				<div class="mail-single-info">
					
					<div class="mail-single-info-user col-lg-12">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{ URL::asset('assets/images/user-3.png') }}" class="img-circle" width="38" /> 
							<span>{{ $message->sender }}</span>
							<!-- (noreply@example.com) to <span>me</span> -->
							<em class="time">{{ $message->created_at }}</em>
						</a>
					</div>
					
				</div>
				
				<!-- Email Body -->
				<div class="mail-single-body">
					{{ $message->body }}
				</div>
				
				<div class="mail-single-reply">
					
					<div class="fake-form">
						<div>
							<a href="mailbox-compose.html">Reply</a> or <a href="mailbox-compose.html">Forward</a> this message...
						</div>
					</div>
					
				</div>
				
			</div>
			
			
		</div>
			
	</div>
	
</section>

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/bootbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/messages-sender-delete.js') }}"></script>

@stop