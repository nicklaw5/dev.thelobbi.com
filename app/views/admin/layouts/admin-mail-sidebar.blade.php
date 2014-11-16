<!-- Mailbox Sidebar -->
<div class="col-sm-3 mailbox-left">
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="">Messsages</h3>
		</div>
		<div class="panel-body">

			<div class="mailbox-sidebar">
				
				<a href="{{ url('admin/messages/create') }}" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right">
					<i class="linecons-mail"></i>
					<span>New Message</span>
				</a>
				
				
				<ul class="list-unstyled mailbox-list">
					<li class="active">
						<a href="{{ url('admin/messages/inbox') }}">
							Inbox
							<span class="badge badge-success pull-right">5</span>
						</a>
					</li>
					<li>
						<a href="{{ url('admin/messages/sent') }}">
							Sent
						</a>
					</li>
					<li>
						<a href="{{ url('admin/messages/trash') }}">
							Trash
						</a>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
	
</div>