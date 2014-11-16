<?php

class GamingEventsController extends BaseController {

	protected $event;
	protected $logger;

	function __construct(GamingEvent $event, Logger $logger) {
		$this->event = $event;
		$this->logger = $logger;
	}

	public function index() {}

	public function listEvents() {
		$events = $this->event->returnEventsList();

		return View::make('events.list')
					->with('events', $events);
	}

	public function create() {
		return View::make('events.create');
	}	

	public function store() {
		
		//validate input
		if( ! $this->isValid(Input::all(), $this->event))
			return Redirect::back()->withInput()->withErrors($this->event->inputErrors);

		if( ! $this->event->saveNewEvent(Input::all())) {
			//log error to logger
			$errorNum =  $this->logger->createLog('GamingEventsController', 'store', 'Failed to add event to DB.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to save the event to the database. Contact an administrator if this continues.');
			return Redirect::back();
		}

		Session::put('adminSuccessAlert', 'Event successfully added.');
		return Redirect::to('admin/events');
	}

	public function edit($event_id) {
		return View::make('events.edit')
					->with('event', $this->event->find($event_id));
	}

	public function update($event_id) {
		
		if( ! $this->event->updateEvent($event_id, Input::all())) {
			$errorNum = $this->logger->createLog('GamingEventsController', 'update', 'Failed to edit the event with an ID of "'.$event_id.'"', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', '<b>Error #'. $errorNum . '</b> - Something went wrong attempting to edit the event. Contact an administrator if this continues.');
			return Redirect::back()->withInput();
		}

		//return successful update
		Session::put('adminSuccessAlert', 'Event successfully updated.');
		return Redirect::to('admin/events');					
	}

	public function calendar() {
		return View::make('events.calendar');
	}

	public function destroy($event_id) {
		
		if(Request::ajax())	{
			//get tag_id
			if( ! $tag_id = DB::table('event_tags')->where('event_id', '=', $event_id)->pluck('tag_id')) {
				Session::put('adminDangerAlert', 'Unable to find tag ID. Contact an administrator.');
				return;
			}
			
			//Check if event is tagged in articles/video before deleting
			if(DB::table('article_tags')->where('tag_id', '=', $tag_id)->get()
					|| 	DB::table('video_tags')->where('tag_id', '=', $tag_id)->get()) {

				Session::put('adminInfoAlert', 'You cannot delete this event because it is tagged in either an article or video.');
				return;
			}		
			else {
				//delete article
				if($event = $this->event->find($event_id)) {
					$event->delete();
					Session::put('adminSuccessAlert', 'Event deleted.');
					return;
				} else {
					Session::put('adminDangerAlert', 'Something went wrong attempting to delete the event.');
					return;
				}
			}
		}
	}
}