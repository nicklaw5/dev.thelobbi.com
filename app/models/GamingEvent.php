<?php

/**
 * Event model
 */
class GamingEvent extends Eloquent {

	protected $table = 'events';
	protected $fillable = [''];
	protected $guarded = [''];
	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'event' 		=> 	'required|unique:events',
		'description' 	=> 	'max:500',
		'website'		=>	'url|max:150',
		'start_date'	=>	'required',
		'end_date'		=>	'required',
		'created_by'	=>	'integer|exists:users,id'
	];

	public function saveNewEvent($input) {

		$string = App::make('StringClass');
		$date = App::make('DateClass');

		$this->event		  	= $string->nullifyAndStripTags($input['event']);
		$this->event_slug  		= $string->slugify($this->event);
		$this->description 		= $string->nullifyAndStripTags($input['description']);
		$this->website 			= $string->nullifyAndStripTags($input['website']);
		$this->start_date 		= $date->formatDate($input['start_date'], 'Y-m-d');
		$this->end_date 		= $date->formatDate($input['end_date'], 'Y-m-d');
		$this->created_by		= intval(Auth::id());
		$this->save();

		$event_id = $this->returnGameData('id', 'event', $this->event);

		//add event as a tag
		$tag = App::make('Tag');
		if($tag->createNewTag($this->table, $event_id))
			return true;
		return false;
	}

	public function returnGameData($data, $field, $value) {
		return DB::table($this->table)->where($field, $value)->pluck($data);
	}

	public function updateEvent($event_id, $input) {

		$string = App::make('StringClass');
		$date = App::make('DateClass');

		DB::table($this->table)
            ->where('id', $event_id)
            ->update(array(
            	'event'				=> $event = $string->nullifyAndStripTags($input['event']),
            	'event_slug'		=> $string->slugify($event),
            	'description'		=> $string->nullifyAndStripTags($input['description']),
            	'website'			=> $string->nullifyAndStripTags($input['website']),
            	'start_date'		=> $date->formatDate($input['start_date'], 'Y-m-d'),
            	'end_date'			=> $date->formatDate($input['end_date'], 'Y-m-d')
            ));
            
        return true;
	}

	public function returnEventsList() {
		$events = DB::table($this->table)
				->select(DB::raw('events.id, events.event, events.event_slug, events.description,
									events.start_date, events.end_date'))
	            ->orderBy('events.created_at', 'desc')
	            ->get();

		return $events;
	}

	public function deleteEvent($event_id) {

		//get tag_id
		if( ! $tag_id = DB::table('event_tags')->where('event_id', '=', $event_id)->pluck('tag_id')) {
			Session::put('adminDangerAlert', 'Unable to find tag ID. Contact an administrator.');
			return;
		}
		
		if(DB::table('article_tags')->where('tag_id', '=', $tag_id)->get()
				|| 	DB::table('video_tags')->where('tag_id', '=', $tag_id)->get()) {

			Session::put('adminInfoAlert', 'You cannot delete this event because it is tagged in either an article or video.');
			return;
		}		
		else {
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