<?php

class VideosController extends BaseController {

	protected $video;
	protected $videoCategory;
	protected $platform;
	protected $game;
	protected $company;
	protected $logger;
	protected $setting;

	public function __construct(Logger $logger, Video $video, Game $game, VideoCategory $videoCategory, 
								Platform $platform, Company $company, Setting $setting) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'edit', 'destroy',
														   'listplatforms', 'publish', 'unpublish')));
		$this->logger = $logger;		
		$this->video = $video; 
		$this->platform = $platform;
		$this->videoCategory = $videoCategory;
		$this->game = $game;
		$this->company = $company;
		$this->setting = $setting;
	}

	public function index() {
		return "holla";
	}

	public function listVideos() {

		$uVideos = $this->video->returnVideosList(null, false);
		$pVideos = $this->video->returnVideosList(null, true);

		//dd($pVideos);

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
				App::about(404);
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
					->with('companies', $this->returnModelList($this->company, 'name', 'id', 'name'))
					->with('platforms', $this->returnModelList($this->platform, 'name', 'id', 'id'))
					->with('games', $this->returnModelList($this->game, 'title', 'id', 'title'))
					->with('video_categories', $this->returnModelList($this->videoCategory, 'category', 'id', 'id'));
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

		// return successful insertion
		Session::put('adminSuccessAlert', 'New video added.');
		return Redirect::to('/admin/videos');

	}

	public function edit($video_id) {

		if( ! $video = $this->video->find($video_id))
			App::abort(404);

		return View::make('videos.edit')
					->with('video', $video)
					->with('games', $this->returnModelList($this->game, 'title', 'id', 'title'))
					->with('video_categories', $this->returnModelList($this->videoCategory, 'category', 'id', 'id'));
	}

	public function update($video_id) {

		//attempt to save video to DB
		if( ! $video_id = $this->video->updateVideo($video_id, Input::all())) {

			//log error to logger
			$errorNum =  $this->logger->createLog('VideosController', 'update', 'Failed to add video to DB.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to add the video to the database. Contact an administrator if this continues.');
			return Redirect::back();
		}

		// return successful insertion
		Session::put('adminSuccessAlert', '<b>'. Input::get('title') .'</b> has been updated.');
		return Redirect::to('/admin/videos');

	}

	public function publish($video_id) {

		if(Request::ajax())	{

			if($video = $this->video->find($video_id)) {

				$title = $video->title;

				$video->is_published = true;
				if($video->published_at === null)
					$video->published_at = date('Y-m-d H:i:s');
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