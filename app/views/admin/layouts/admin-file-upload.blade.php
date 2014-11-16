<div class="panel panel-default">
			
	<div class="panel-heading">
		<h3 class="panel-title">
			File Upload <small>(images/videos)</small>
		</h3>
	</div>
	
	<div class="panel-body">
		
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				var i = 1,
					$example_dropzone_filetable = $("#example-dropzone-filetable"),
					example_dropzone = $("#advancedDropzone").dropzone({
					url: 'data/upload-file.php',
					
					// Events
					addedfile: function(file)
					{
						if(i == 1)
						{
							$example_dropzone_filetable.find('tbody').html('');
						}
						
						var size = parseInt(file.size/1024, 10);
						size = size < 1024 ? (size + " KB") : (parseInt(size/1024, 10) + " MB");
						
						var $entry = $('<tr>\
										<td class="text-center">'+(i++)+'</td>\
										<td>'+file.name+'</td>\
										<td><a href="#" class="copy-url" data-url="http://static.thelobbi.com/upldoads/images/'+file.name+'"><i class="fa-copy"></i></a></td>\
										<td><div class="progress progress-striped"><div class="progress-bar progress-bar-warning"></div></div></td>\
										<td>'+size+'</td>\
										<td>Uploading...</td>\
									</tr>');
						
						$example_dropzone_filetable.find('tbody').append($entry);
						file.fileEntryTd = $entry;
						file.progressBar = $entry.find('.progress-bar');
					},
					
					uploadprogress: function(file, progress, bytesSent)
					{
						file.progressBar.width(progress + '%');
					},
					
					success: function(file)
					{
						file.fileEntryTd.find('td:last').html('<span class="text-success">Uploaded</span>');
						file.progressBar.removeClass('progress-bar-warning').addClass('progress-bar-success');
					},
					
					error: function(file)
					{
						file.fileEntryTd.find('td:last').html('<span class="text-danger">Failed</span>');
						file.progressBar.removeClass('progress-bar-warning').addClass('progress-bar-red');
					}
				});
				
				$("#advancedDropzone").css({
					minHeight: 200
				});

			});
		</script>
		
		<br />
		<div class="row">
			<div class="col-sm-12 text-center">
			
				<div id="advancedDropzone" class="droppable-area">
					Drop or Choose Files
				</div>
				
			</div>
			<div class="col-sm-12">
				<table class="table table-bordered table-striped" id="example-dropzone-filetable">
					<thead>
						<tr>
							<th width="1%" class="text-center">#</th>
							<th width="35%">Name</th>
							<th width="10%">Copy</th>
							<th width="25%">Upload Progress</th>
							<th>Size</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="6">Files list will appear here</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>

</div>

<script src="{{ URL::asset('assets/js/dropzone/dropzone.min.js') }}"></script>