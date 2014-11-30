@extends('admin.layouts-new.admin-template')
	
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">All Companies</h3>
		<div class="panel-options">
			<a href="{{ url('admin/companies/create') }}">
				<button type="button" class="btn btn-primary" style="margin: 0">New Company</button>
			</a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>Company Name</th>
					<th width="225">Links</th>
					<th width="140">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($companies->getCollection() as $company)
				<tr>
					<td><a href="/companies/{{ $company->name_slug }}">{{ $company->name }}</a></td>
					<td>
						<ul class="social-quick-links">
							{{ ($company->website === null)? '': '<li><a title="Company Website" target="_blank" href="'.$company->website.'"><i class="fa-globe"></i></a></li>'; }}
							{{ ($company->twitter === null)? '': '<li><a title="Twitter" target="_blank" href="'.$company->twitter.'"><i class="fa-twitter"></i></a></li>'; }}							
							{{ ($company->facebook === null)? '': '<li><a title="Facebook" target="_blank" href="'.$company->facebook.'"><i class="fa-facebook"></i></a></li>'; }}
							{{ ($company->google_plus === null)? '': '<li><a title="Google Plus" target="_blank" href="'.$company->google_plus.'"><i class="fa-google-plus"></i></a></li>'; }}
							{{ ($company->youtube === null)? '': '<li><a title="Youtube" target="_blank" href="'.$company->youtube.'"><i class="fa-youtube"></i></a></li>'; }}
							{{ ($company->twitch === null)? '': '<li><a title="Twitch" target="_blank" href="'.$company->twitch.'"><i class="fa-twitch"></i></a></li>'; }}
						</ul>
					</td>
					<td>
						<a style="float:left" href="companies/{{ $company->id }}/edit" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
						<button style="float:left; margin-left: 5px;" data-id="{{ $company->id }}" class="delete-btn btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $companies->links() }}
	</div>
</div>

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/bootbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables/js/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">	
	$(document).ready(function() {
		$('.delete-btn').click(function() {
			$company_id = $(this).attr('data-id');
			bootbox.dialog({
			  message: "Are you sure you want to delete this company?",
			  title: "Confirmation",
			  buttons: {
			    danger: {
			      label: "Cancel",
			      className: "btn-primary",
			      callback: function() {
			    	// do nothing
			      }
			    },
			    success: {
			      label: "Delete",
			      className: "btn-danger",
			      callback: function() {
			      	$.ajax({
				        url: '/companies/' + $company_id,
				        type: 'post',
				        data: {_method: 'delete'},
				        success:function(msg){
				        	location.reload();
				        }
					});
			      }
			    }
			  }
			});
		});
	});
</script>

@stop