$(document).ready(function(){

	$('#trashBtn').click(function(){
		//alert($('.cbr:checkbox:checked'));

		var checkedVals = $('.cbr:checkbox:checked').map(function() {
		    return $(this).data("id");
		}).get();

		if(checkedVals == '') {
			bootbox.alert("No messages selected.", function() {});
		} else {
			$messages = checkedVals.join(",");

			bootbox.dialog({
			  message: "Are you sure you want to trash all selected messages?",
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
			      label: "Trash Message(s)",
			      className: "btn-danger",
			      callback: function() {
			      	$.ajax({
				        url: 'messages/trash',
				        type: 'post',
				        data: {messages: $messages},
				        success:function(msg){
				        	location.href = '/admin/messages';
				        }
					});
					
			      }
			    }
			  }
			});
		}
	});
});