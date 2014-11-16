$(document).ready(function() {

	//hide certain conatainer on page load
	$('.video-container').hide();
	$('.review-score-container').hide();
	$('.feature-image-container').hide();

	//show video container
	$('#chkbox-video').click(function () {
	    if($("#chkbox-video").prop('checked')) {
	    	//alert('checked');

		    $(".video-container").show();  // checked
		}
		else {
			//alert('unchecked');
		    $(".video-container").hide();  // unchecked
		}
	});

	//show appropriate fields for the selected article type
	$('#article_category').change(function() {
		$selected = $('#article_category option:selected').text();

		if($selected === 'Review') {
			$('.review-score-container').show();
			$('#review_score').prop('required', true);
		}
		else {
			$('.review-score-container').hide();
			$('#review_score').removeProp('required');
		}

		if($selected === 'Review' || $selected === 'Feature') {
			$('.feature-image-container').show();
			$('#feature_image').prop('required', true);
		}
		else {
			$('.feature-image-container').hide();
			$('#feature_image').removeProp('required');
		}

	});
});