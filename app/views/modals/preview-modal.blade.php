<!-- Preview Modal -->
<!-- <a style="margin-top:22px;" href="javascript:;" onclick="jQuery('#filemanagerModal').appendTo(body).modal('show');jQuery('#filemanager').attr('src', '/assets/filemanager/dialog.blade.php?type=0&field_id=box_art');" class="btn btn-blue">Add Box Art</a> -->
<div class="modal fade custom-width" id="previewModal">
	<div class="modal-dialog" style="width: 80%">
		<div class="modal-content">
			<script>
				var height = window.screen.height * .8;
				document.write(
					'<iframe id="frame" width="100%" height="'+height+'px"></iframe>');
			</script>
		</div>
	</div>
</div>