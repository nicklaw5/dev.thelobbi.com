@extends('admin.layouts-new.admin-template')
	
@section('content')

<section class="mailbox-env">
				
	<div class="row">
		
		@include('admin.layouts.admin-mail-sidebar')

		<!-- Inbox emails -->
		<div class="col-sm-9 mailbox-right">
			
			<div class="mail-env">
				<div class="panel-heading">
					<h3 class="">Sent Messages</h3>
					@if( $messageCount === 0 )
					<p class="col-sm-12">You have no sent messages.</p>
					@endif
				</div>

				@if( $messageCount !== 0 )

					<!-- mail table -->
					<table class="table mail-table">
					
						<!-- mail table header -->
						<thead>
							<tr>
								<th class="col-cb">
									<input type="checkbox" class="cbr" />
								</th>
								<th colspan="4" class="col-header-options">
									
									<div class="mail-select-options">Select all</div>
									
									<div class="mail-pagination">
										<strong>{{ $messageCount }}</strong> total messages sent
									</div>
								</th>
							</tr>
						</thead>
					
						<!-- mail table footer -->
						<tfoot>
							<tr>
								<th class="col-cb"></th>
								<th colspan="4" class="col-header-options">
									<div style="float:left">
										<button id="deleteBtn" type="button" class="btn btn-small btn-danger">Delete Selected</button>
									</div>
									<div class="mail-pagination">
										<!-- Showing <strong>{{ count($messages) }}</strong> of <strong>{{ $messageCount }}</strong> total messages -->
										{{ $messages->links() }}
										
									</div>

								</th>
							</tr>
						</tfoot>
						
						<!-- email list -->
						<tbody>
							@foreach($messages->getCollection() as $message)
							<tr>
								<td class="col-cb">
									<div class="checkbox checkbox-replace">
										<input type="checkbox" class="cbr" data-id="{{ $message->id }}" />
									</div>
								</td>
								<td class="col-name">
									<a href="{{ url('admin/messages/'.$message->id.'/sent') }}" class="col-name">{{ $message->recipient }}</a>
								</td>
								<td class="col-subject">
									<a href="{{ url('admin/messages/'.$message->id.'/sent') }}">
										{{ $message->subject }}
									</a>
								</td>
								
								<td class="col-time">{{ $message->created_at }}</td>
							</tr>
							@endforeach							
						</tbody>						
					</table>

				@endif

			</div>
			
		</div>
		
	</div>
	
</section>

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/bootbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/messages-init.js') }}"></script>
<script src="{{ URL::asset('assets/js/messages-sender-delete.js') }}"></script>

@stop