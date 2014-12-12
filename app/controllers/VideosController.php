<?php

class VideosController extends BaseController {

	protected $video;
	protected $videoCategory;
	protected $platform;
	protected $game;
	protected $company;
	protected $logger;
	protected $setting;
	protected $event;
	protected $tag;

	public function __construct(Logger $logger, Video $video, Game $game, VideoCategory $videoCategory, Tag $tag, 
								Platform $platform, Company $company, Setting $setting, GamingEvent $event) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'edit', 'destroy',
														   'listplatforms', 'publish', 'unpublish')));
		$this->logger = $logger;		
		$this->video = $video; 
		$this->platform = $platform;
		$this->videoCategory = $videoCategory;
		$this->game = $game;
		$this->company = $company;
		$this->setting = $setting;
		$this->event = $event;
		$this->tag = $tag;
	}

	public function index() {
		return "holla";
	}

	public function listVideos() {

		$uVideos = $this->video->returnVideosList(null, false);
		$pVideos = $this->video->returnVideosList(null, true);
		
		return View::make('videos.list')->with('uVideos', $uVideos)
										->with('pVideos', $pVideos);
	}

	public function showVideo($y, $m, $d, $title_slug) {

		$date = App::make('DateClass');

		//check if video_slug exists
		if( ! $video = $this->video->getVideo($title_slug))
			App::abort(404);

		//check date matches URL
		if($y.$m.$d !== $date->formatDate($video->published_at, 'Ymd'))
			App::abort(404);

		//only show video if admin user or if published
		if(Auth::guest() || ! Auth::user()->group_id > 1) {
			if ( ! $video->is_published)
				App::abort(404);
		}

		//increment number of video views
		$this->incrementViews('videos', 'title_slug', $title_slug);
		
		//format published date
		$video->published_at = $date->formatDate($video->published_at, 'd F Y');

		//show video
		return View::make('videos.show')
					->with('video', $video)
					->with('autoplay_video', $this->setting->autoplayVideos());
	}

	public function show($title_slug) {
		
	}

	public function create() {

		return View::make('videos.create')
					->with('companies', 		$this->returnModelList($this->company, 'name', 'id', 'name'))
					->with('platforms', 		$this->returnModelList($this->platform, 'name', 'id', 'id'))
					->with('games', 			$this->returnModelList($this->game, 'title', 'id', 'title'))
					->with('events', 			$this->returnModelList($this->event, 'event', 'id', 'id'))
					->with('video_categories', 	$this->returnModelList($this->videoCategory, 'category', 'id', 'id'));

	}

	//POST 		games 					games.store
	public function store() {

		// Validate the video data
		if( ! $this->isValid(Input::all(), $this->video))
			return Redirect::back()->withInput()->withErrors($this->video->inputErrors);

		//attempt to save video to DB
		if( ! $video_id = $this->video->saveNewVideo(Input::all())) {
			//log error to logger
			$errorNum =  $this->logger->createLog('VideosController', 'store', 'Failed to add video to DB.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to add the video to the database. Contact an administrator if this continues.');
			return Redirect::back();
		}

		//insert game tags
		if( ! empty($games = Input::get('games'))) {
			foreach($games as $game_id) {
				$this->tag->insertTagReference('video', $video_id, 'game', $game_id);
			}
		}

		//insert platform tags
		if( ! empty($platforms = Input::get('platforms'))) {
			foreach($platforms as $platform_id) {
				$this->tag->insertTagReference('video', $video_id, 'platform', $platform_id);
			}
		}

		//insert company tags
		if( ! empty($companies = Input::get('companies'))) {
			foreach($companies as $company_id) {
				$this->tag->insertTagReference('video', $video_id, 'company', $company_id);
			}
		}

		//insert event tags
		if( ! empty($events = Input::get('events'))) {
			foreach($events as $event_id) {
				$this->tag->insertTagReference('video', $video_id, 'event', $event_id);
			}
		}

		// return successful insertion
		Session::put('adminSuccessAlert', 'New video added.');
		return Redirect::to('/admin/videos');

	}

	public function edit($video_id) {

		if( ! $video = $this->video->find($video_id))
			App::abort(404);

		return View::make('videos.edit')
					->with('video', $video)
					->with('companies', 		$this->returnModelList($this->company, 'name', 'id', 'name'))
					->with('company_tags',		$this->tag->getMediaTags('video', $video_id, 'company'))
					->with('platforms', 		$this->returnModelList($this->platform, 'name', 'id', 'id'))
					->with('platform_tags',		$this->tag->getMediaTags('video', $video_id, 'platform'))
					->with('games', 			$this->returnModelList($this->game, 'title', 'id', 'title'))
					->with('game_tags',			$this->tag->getMediaTags('video', $video_id, 'game'))
					->with('events', 			$this->returnModelList($this->event, 'event', 'id', 'id'))
					->with('event_tags',		$this->tag->getMediaTags('video', $video_id, 'event'))
					->with('video_categories', $this->returnModelList($this->videoCategory, 'category', 'id', 'id'));
	}

	public function update($video_id) {

		$video_id = intval($video_id);

		//attempt to save video to DB
		if( ! $this->video->updateVideo($video_id, Input::all())) {

			//log error to logger
			$errorNum =  $this->logger->createLog('VideosController', 'update', 'Failed to add video to DB.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to add the video to the database. Contact an administrator if this continues.');
			return Redirect::back();
		}

		//update game tags
		if( ! empty($games = Input::get('games'))) {
			//delete existing tags
			$this->tag->deleteTagReference('video', $video_id, 'game');
			foreach($games as $game_id) {
				$this->tag->insertTagReference('video', $video_id, 'game', $game_id);
			}
		}
		else {
			//delete tag references if games is empty
			$this->tag->deleteTagReference('video', $video_id, 'game');
		}

		//update platform tags
		if( ! empty($platforms = Input::get('platforms'))) {
			//delete existing tags
			$this->tag->deleteTagReference('video', $video_id, 'platform');
			foreach($platforms as $platform_id) {
				$this->tag->insertTagReference('video', $video_id, 'platform', $platform_id);
			}
		}
		else {
			//delete tag references if games is empty
			$this->tag->deleteTagReference('video', $video_id, 'platform');
		}

		//update company tags
		if( ! empty($companies = Input::get('companies'))) {
			//delete existing tags
			$this->tag->deleteTagReference('video', $video_id, 'company');
			foreach($companies as $company_id) {
				$this->tag->insertTagReference('video', $video_id, 'company', $company_id);
			}
		}
		else {
			//delete tag references if games is empty
			$this->tag->deleteTagReference('video', $video_id, 'company');
		}

		//update event tags
		if( ! empty($events = Input::get('events'))) {
			//delete existing tags
			$this->tag->deleteTagReference('video', $video_id, 'event');
			foreach($events as $event_id) {
				$this->tag->insertTagReference('video', $video_id, 'event', $event_id);
			}
		}
		else {
			//delete tag references if events is empty
			$this->tag->deleteTagReference('video', $video_id, 'event');
		}

		// return successful insertion
		Session::put('adminSuccessAlert', '<b>'. Input::get('title') .'</b> has been updated.');
		return Redirect::to('/admin/videos');

	}

	public function publish($video_id) {

		if(Request::ajax())	{

			if($video = $this->video->find($video_id)) {

				$date = App::make('DateClass');

				$title = $video->title;

				$video->is_published = true;
				if($video->published_at === null)
					$video->published_at = $date->newDate();
				$video->save();

				Session::put('adminSuccessAlert', '<b>'.$title.'</b> has been published.');
			} else {
				Session::put('adminDangerAlert', 'Something went wrong attempting to publish <b>'.$title.'</b>.');	
			}
			return;
		}
	}

	public function unpublish($video_id) {

		if(Request::ajax())	{
			
			if($video = $this->video->find($video_id)) {
				
				$title = $video->title;
				$video->is_published = false;
				$video->save();

				Session::put('adminSuccessAlert', '<b>'.$title.'</b> has  been unpublished.');
			} else {
				Session::put('adminDangerAlert', 'Something went wrong attempting to unpublish <b>'.$title.'</b>.');	
			}
			return;
		}
	}

	public function destroy($video_id) {

		if(Request::ajax())	{
			
			if($video = $this->video->find($video_id)) {

				$title = $video->title;

				if($video->is_published) {
					Session::put('adminDangerAlert', 'You cannot delete a video whilst it is publlished. Unpublish the video first and then attempt to delete it.');
					return;
				}

				$video->delete();
				Session::put('adminSuccessAlert', '<b>'.$title.'</b> has been deleted.');
			} 
			else {
				Session::put('adminDangerAlert', 'Something went wrong attempting to delete <b>'.$title.'</b>.');	
			}

			return;
		}
	}

}