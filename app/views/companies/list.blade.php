@extends('admin.layouts.admin-default')
	

@section('content')

<h2><strong>Comapanies List</strong></h2>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Company Name</th>
			<th>Description</th>
			<th>Website</th>
			<th>Facebook</th>			
			<th>Twitter</th>
			<th width="245">Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($companies as $company)
		<tr>
			<td><a href="{{ $company->id }}">{{ $company->name }}</a></td>
			<td>{{ $company->description }}</td>
			<td></td>
			<td></td>
			<td></td>
			<td>
				<a href="#" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>		
				<a href="#" class="btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</a>
				<a href="#" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-info"></i>View</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<script src="{{ URL::asset('assets/js/custom/list-functions.js') }}"></script>

@stop