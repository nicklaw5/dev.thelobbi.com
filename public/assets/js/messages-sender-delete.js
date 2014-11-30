$(document).ready(function(){

	$('#deleteBtn').click(function() {

		var checkedVals = $('.cbr:checkbox:checked').map(function() {
		    return $(this).data("id");
		}).get();

		if(checkedVals == '') {
			bootbox.alert("No messages selected.", function() {});
		} else {
			$messages = checkedVals.join(",");

			bootbox.dialog({
			  message: "Are you sure you want to permanently delete all selected messages?",
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
			      label: "Delete Message(s)",
			      className: "btn-danger",
			      callback: function() {
			      	$.ajax({
				        url: '/admin/messages/sender-delete',
				        type: 'post',
				        data: {messages: $messages},
				        success:function(msg){
				        	location.href = '/admin/messages/sent';
				        }
					});
			      }
			    }
			  }
			});
		}
	});
});