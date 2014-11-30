jQuery(document).ready(function($) {
	
	var $state = $(".mail-table thead input[type='checkbox'], .mail-table tfoot input[type='checkbox']"),
		$chcks = $(".mail-table tbody input[type='checkbox']");
	
	// Script to select all checkboxes
	$state.on('change', function(ev)
	{
		if($state.is(':checked'))
		{
			$chcks.prop('checked', true).trigger('change');
		}
		else
		{
			$chcks.prop('checked', false).trigger('change');
		}
	});
	
	// Row Highlighting
	$chcks.each(function(i, el)
	{
		var $tr = $(el).closest('tr');
		
		$(this).on('change', function(ev)
		{
			$tr[$(this).is(':checked') ? 'addClass' : 'removeClass']('highlighted');
		});
	});
	
	// Stars
	$(".mail-table .star").on('click', function(ev)
	{
		ev.preventDefault();
		
		if( ! $(this).hasClass('starred'))
		{
			$(this).addClass('starred').find('i').attr('class', 'fa-star');
		}
		else
		{
			$(this).removeClass('starred').find('i').attr('class', 'fa-star-empty');
		}
	});
});