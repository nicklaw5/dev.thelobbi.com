<?php

/**
 * Video model
 */
class Video extends Eloquent {

	protected $table = 'videos';
	protected $fillable = [];
	protected $guarded = [];
	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'viedo_category'		=>  'integer|exists:video_categories,id',
		'title'					=> 	'max:150|required|unique:videos',
		'video'					=>  'max:250|url|required|unique:videos',
		'video_short'			=>  'max:250|url',
		'image'					=>	'max:250|url|required',
		'description' 			=> 	'max:350|required',
		'is_published'			=>  'integer',
		'last_edited_by'		=>  'integer|exists:users,id',
		'last_edit_comment'		=> 	'max:250'
	];

	public function saveNewVideo($input) {

		$string = App::make('StringClass');
		$date = App::make('DateClass');

		$this->video_category	= intval($input['video_category']);
		$this->author_id		= intval(Auth::id());
		$this->game_id			= intval($input['game']);
		$this->title 			= $string->nullifyAndStrip($input['title']);
		$this->title_slug		= $string->slugify($this->title);
		$this->video 			= $string->nullifyAndStrip($input['video']);
		$this->video_short		= $string->nullifyAndStrip($input['video_short']);
		$this->image			= $string->nullifyAndStrip($input['image']);
		$this->description		= $string->nullifyAndStrip($input['description']);
		$this->posted_at		= $date->newDate();
		$this->save();

		return $this->returnVideoData('id', 'title', $this->title);
	}

	public function updateVideo($video_id, $input) {

		$string = App::make('StringClass');

		DB::table($this->table)
            ->where('id', $video_id)
            ->update(array(
            	'video_category'	=> intval($input['video_category']),
            	'game_id'			=> intval($input['game']),
            	'title' 			=> $string->nullifyAndStrip($input['title']),
            	'title_slug'		=> $string->slugify($this->title),
				'video' 			=> $string->nullifyAndStrip($input['video']),
				'video_short'		=> $string->nullifyAndStrip($input['video_short']),
				'image'				=> $string->nullifyAndStrip($input['image']),
				'description'		=> $string->nullifyAndStrip($input['description']),
				'last_edit_by'		=> intval(Auth::id())
			));

		return true;
	}

	public function returnVideoData($want, $have, $value) {
		return DB::table($this->table)->where($have, $value)->pluck($want);
	}

	public function returnVideosList($numberOfVideos = null, $is_published = true) {
		$videos = DB::table($this->table)
                ->select(
                	DB::raw(
	                	'videos.id, videos.title, videos.title_slug,
	                	 videos.video, videos.video_short, videos.image, videos.description,
	                	 videos.views, videos.posted_at, videos.published_at,

	                	 GROUP_CONCAT(DISTINCT vc.category) AS category,
	                	 GROUP_CONCAT(DISTINCT u.first_name) AS first_name,
	                 	 GROUP_CONCAT(DISTINCT u.last_name) AS last_name,
	                	 GROUP_CONCAT(DISTINCT g.title) AS game_title'
                	)
                )

                ->leftJoin('video_categories AS vc', 'vc.id', '=', 'videos.video_category')
                ->leftJoin('users AS u', 'u.id', '=', 'videos.author_id')
                ->leftJoin('games AS g', 'g.id', '=', 'videos.game_id')

                ->where('videos.is_published', '=', $is_published)

		        ->groupBy('videos.id')
	            ->orderBy('videos.created_at', 'desc')
	            ->limit($numberOfVideos)
	            ->get();

	    $date = App::make('DateClass');

		foreach($videos as $video) {
			$video->posted_at = $date->formatDate($video->posted_at, 'dS M Y');
			$video->url = '/videos/' . $date->formatDate($video->published_at, 'Y/m/d/') . $video->title_slug;
		}

		return $videos;
	}

	public function getVideo($title_slug) {
		//check if video exists
		return DB::table($this->table)->where('title_slug', $title_slug)->first();
	}

}