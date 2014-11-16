jQuery(document).ready(function($) {

	// $("#place").click(function () {
	//  	alert("Selected value is: "+$("#s2id_autogen1").select2("val"));
	//  });

	$("#place").click(function () { 
		alert("Selected value is: "+JSON.stringify($("#s2id_autogen1").select2().length));
	});

});