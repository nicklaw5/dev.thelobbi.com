@extends('admin.layouts.admin-default')
	
@section('content')

<div style="clear:both">
	<h2><strong>Comapanies List</strong></h2>
</div>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th width="300">Company Name</th>
			<th>Description</th>
			<th>Website</th>
			<th>Facebook</th>			
			<th>Twitter</th>
			<th width="165">Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($companies as $company)
		<tr>
			<td><a href="/companies/{{ $company->name_slug }}">{{ $company->name }}</a></td>
			<td>{{ ($company->description === null)? ' - ': $company->description }}</td>
			<td>{{ ($company->website === null)? ' - ': '<a target="_blank" href="'.$company->website.'">Website Link</a>'; }}</td>
			<td>{{ ($company->facebook === null)? ' - ': '<a target="_blank" href="'.$company->facebook.'">Facebook Link</a>'; }}</td>
			<td>{{ ($company->twitter === null)? ' - ': '<a target="_blank" href="'.$company->twitter.'">Twitter Link</a>'; }}</td>
			<td>
				<a style="float:left" href="companies/{{ $company->id }}/edit" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>
				<button style="float:left; margin-left: 5px;" data-id="{{ $company->id }}" class="delete-btn btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<script src="{{ URL::asset('assets/js/custom/list-functions.js') }}"></script>

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
			      className: "btn-default",
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