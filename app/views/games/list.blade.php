@extends('admin.layouts.admin-default')
	

@section('content')

<h2><strong>Games List</strong></h2>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Game Title</th>
			<th>Developer(s) / Publisher(s)</th>
			<th>Genre(s)</th>
			<th>Platform(s)</th>			
			<th>Release Date(s)</th>
			<th width="245">Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($games as $game)
		<tr>
			<td><a href="{{ $game->id }}">{{ $game->title }}</a></td>
			<td><a href=""></td>
			<td>Win 95+</td>
			<td>4</td>
			<td>4</td>
			<td>
				<a href="#" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>Edit</a>		
				<a href="#" class="btn btn-danger btn-sm btn-icon icon-left"><i class="entypo-cancel"></i>Delete</a>
				<a href="#" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-info"></i>View</a>
			</td>
		</tr>
		@endforeach
		</tr>
	</tbody>
</table>

<script type="text/javascript">
var responsiveHelper;
var breakpointDefinition = {
    tablet: 1024,
    phone : 480
};
var tableContainer;

	jQuery(document).ready(function($)
	{
		tableContainer = $("#table-1");
		
		tableContainer.dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true,
			

		    // Responsive Settings
		    bAutoWidth     : false,
		    fnPreDrawCallback: function () {
		        // Initialize the responsive datatables helper once.
		        if (!responsiveHelper) {
		            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
		        }
		    },
		    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		        responsiveHelper.createExpandIcon(nRow);
		    },
		    fnDrawCallback : function (oSettings) {
		        responsiveHelper.respond();
		    }
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>


@stop