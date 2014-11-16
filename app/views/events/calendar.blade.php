@extends('admin.layouts-new.admin-template')
	
@section('content')


<script type="text/javascript">
// Calendar Initialization
// http://fullcalendar.io/docs/
jQuery(document).ready(function($)
{
	// Form to add new event
	var colors = ['red', 'blue', 'primary', 'success', 'warning', 'info', 'danger', 'purple', 'black', 'gray'];
	
	$("#add_event_form").on('submit', function(ev)
	{
		ev.preventDefault();
		
		var $event = $(this).find('.form-control'),
			event_name = $event.val().trim();
		
		if(event_name.length >= 3)
		{
			var color = colors[Math.floor(Math.random()*colors.length)];
			
			// Create Event Entry
			$("#events-list").append(
				'<li>\
					<a href="#" data-event-class="event-color-' + color + '">\
						<span class="badge badge-' + color + ' badge-roundless upper">' + event_name + '</span>\
					</a>\
				</li>'
			);
			
			
			// Reset draggable
			$("#events-list li").draggable({
				revert: true,
				revertDuration: 50,
				zIndex: 999
			});
			
			// Reset input
			$event.val('').focus();
		}
		else
		{
			$event.focus();
		}
	});
	
	
	// Calendar Initialization
	$('#calendar').fullCalendar({
		header: {
			left: 'title',
			center: '',
			right: 'month,agendaWeek,agendaDay prev,next'
		},
		buttonIcons: {
			prev: 'prev fa-angle-left',
			next: 'next fa-angle-right',
		},
		defaultDate: '2014-09-12',
		editable: true,
		eventLimit: true,
		events: [
			{
				title: 'All Day Event',
				start: '2014-09-01'
			},
			{
				title: 'Long Event',
				start: '2014-09-07',
				end: '2014-09-10'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2014-09-09T16:00:00'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2014-09-16T16:00:00'
			},
			{
				title: 'Conference',
				start: '2014-09-11',
				end: '2014-09-13'
			},
			{
				title: 'Meeting',
				start: '2014-09-12T10:30:00',
				end: '2014-09-12T12:30:00'
			},
			{
				title: 'Lunch',
				start: '2014-09-12T12:00:00'
			},
			{
				title: 'Meeting',
				start: '2014-09-12T14:30:00'
			},
			{
				title: 'Happy Hour',
				start: '2014-09-12T17:30:00'
			},
			{
				title: 'Dinner',
				start: '2014-09-12T20:00:00'
			},
			{
				title: 'Birthday Party',
				start: '2014-09-13T07:00:00'
			},
			{
				title: 'Click for Google',
				url: 'http://google.com/',
				start: '2014-09-28'
			}
		],
		droppable: true,
		drop: function(date) {
			
			var $event = $(this).find('a'),
				eventObject = {
					title: $event.find('.badge').text(),
					start: date,
					className: $event.data('event-class')
				};
			
			$('#calendar').fullCalendar('renderEvent', eventObject, true);
			
			// Remove event from list
			$(this).remove();
		}
	});
	
	
	// Draggable Events
	$("#events-list li").draggable({
		revert: true,
		revertDuration: 50,
		zIndex: 999
	});
});
</script>

<section class="calendar-env">
	
	<div class="col-sm-9 calendar-right">
		
		<div class="calendar-main">
			
			<div id="calendar"></div>
			
		</div>
		
	</div>
	
	<div class="col-sm-3 calendar-left">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Calendar</h6>
			</div>
			<div class="panel-body">
				<div class="calendar-sidebar">
					
					<form method="post" id="add_event_form">
						<input type="text" class="form-control" placeholder="Add new event..." />
					</form>
					
					<br />
						
					<ul class="list-unstyled calendar-list" id="events-list">
						<p class="list-header">Drag to the calendar</p>
						<br>
						<li>
							<a href="#" data-event-class="event-color-success">
								<span class="badge badge-success badge-roundless upper">E3 2015</span>
							</a>
						</li>
						<li>
							<a href="#" data-event-class="event-color-purple">
								<span class="badge badge-purple badge-roundless upper">GDC 2015</span>
							</a>
						</li>
						<li>
							<a href="#" data-event-class="event-color-red">
								<span class="badge badge-red badge-roundless upper">Blizzon 2015</span>
							</a>
						</li>
					</ul>
					
				</div>
			</div>
		</div>
	</div>
	
</section>

<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{ URL::asset('assets/js/fullcalendar/fullcalendar.min.css') }}">

<!-- Imported scripts on this page -->
<script src="{{ URL::asset('assets/js/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>

@stop