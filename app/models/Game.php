<?php
/**
 * Game model
 */
class Game extends Eloquent {

	protected $table = 'games';
	protected $fillable = [];
	protected $guarded = [];

	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'title' 				=> 	'required|unique:games',
		'description' 			=> 	'max:500',
		'website' 				=>	'url|max:150',
		'facebook' 				=>	'url|max:150',
		'twitter' 				=>	'url|max:150',
		'twitch' 				=>	'url|max:150',
		'google_plus' 			=>	'url|max:150',
		'youtube' 				=>	'url|max:150',
		'box_art' 				=> 	'url|max:200',
		'title_image' 			=> 	'url|max:200',
		'price_at_launch' 		=> 	'Regex:/[^0-9.]/'
	];

	public function saveNewGame($input) {

		$string = App::make('StringClass');

		//save new game to DB
		$this->title 			= $string->nullifyAndStripTags($input['title']);
		$this->title_slug		= $string->slugify($this->title);
		$this->description 		= $string->nullifyAndStripTags($input['description']);
		$this->website 			= $string->nullifyAndStripTags($input['website']);
		$this->facebook 		= $string->nullifyAndStripTags($input['facebook']);
		$this->twitter 			= $string->nullifyAndStripTags($input['twitter']);
		$this->twitch 			= $string->nullifyAndStripTags($input['twitch']);
		$this->google_plus 		= $string->nullifyAndStripTags($input['google_plus']);
		$this->youtube 			= $string->nullifyAndStripTags($input['youtube']);
		$this->box_art 			= $string->nullifyAndStripTags($input['box_art']);
		$this->title_image 		= $string->nullifyAndStripTags($input['title_image']);
		$this->price_at_launch 	= $string->nullifyAndStripTags(preg_replace('/[^0-9.]/', '', $input['price_at_launch']));
		$this->save();

		$game_id = $this->returnGameData('id', 'title', $input['title']);

		//add game as a tag
		$tag = App::make('Tag');
		if($tag->createNewTag($this->table, $game_id))
			return $game_id;
		return false;
	}

	public function returnGameData($data, $field, $value) {
		return DB::table($this->table)->where($field, $value)->pluck($data);
	}

	public function insertGameData($game_id, $datas, $table, $column) {

		$date = App::make('DateClass');

		//$time = date('Y-m-d H:i:s');
		foreach ($datas as $data) {
			DB::table($table)->insert(array(
					'game_id' 		=> intval($game_id),
    				$column		 	=> intval($data),
					'created_at'	=> $date->newDate(),
					'updated_at'	=> $date->newDate()
    		));
		}
		return true;
	}

	public function updateGame($game_id, $input) {
		
		$string = App::make('StringClass');

		//update game data
		DB::table($this->table)
            ->where('id', $game_id)
            ->update(array(
            	'title'				=> $title = $string->nullifyAndStripTags($input['title']),
            	'title_slug'		=> $string->slugify($title),
				'description' 		=> $string->nullifyAndStripTags($input['description']),
				'website' 			=> $string->nullifyAndStripTags($input['website']),
				'facebook' 			=> $string->nullifyAndStripTags($input['facebook']),
				'twitter' 			=> $string->nullifyAndStripTags($input['twitter']),
				'twitch' 			=> $string->nullifyAndStripTags($input['twitch']),
				'google_plus' 		=> $string->nullifyAndStripTags($input['google_plus']),
				'youtube' 			=> $string->nullifyAndStripTags($input['youtube']),
				'box_art' 			=> $string->nullifyAndStripTags($input['box_art']),
				'title_image' 		=> $string->nullifyAndStripTags($input['title_image']),
				'price_at_launch' 	=> $string->nullifyAndStripTags(preg_replace('/[^0-9.]/', '', $input['price_at_launch']))
			));
        
        //delete game data from other tables
        $tables = array('game_developers', 'game_publishers', 'game_genres', 'game_platforms');
        foreach($tables as $table) {
        	DB::table($table)->where('game_id', '=', $game_id)->delete();
        }

   		return true;
	}

	public function returnGamesList($numberOfGames) {
		$games = DB::table($this->table)
                ->select(
                	DB::raw(
	                	'games.id, games.title, games.title_slug, 
	                	GROUP_CONCAT(DISTINCT dc.name) AS developers,
	                	GROUP_CONCAT(DISTINCT pc.name) AS publishers,
	                	GROUP_CONCAT(DISTINCT pl.abbreviation) AS platforms,
	                	GROUP_CONCAT(DISTINCT g.name) AS genres'
                	)
                )
                ->leftJoin('game_developers AS gd', 'gd.game_id', '=', 'games.id')
		        ->leftJoin('companies AS dc', 'dc.id', '=', 'gd.developer_id')

		        ->leftJoin('game_publishers AS gp', 'gp.game_id', '=', 'games.id')
		        ->leftJoin('companies AS pc', 'pc.id', '=', 'gp.publisher_id')

				->leftJoin('game_platforms AS gpl', 'gpl.game_id', '=', 'games.id')
		        ->leftJoin('platforms AS pl', 'pl.id', '=', 'gpl.platform_id')			        

		        ->leftJoin('game_genres AS gg', 'gg.game_id', '=', 'games.id')
		        ->leftJoin('genres AS g', 'g.id', '=', 'gg.genre_id')

		        ->groupBy('games.id')
	            ->orderBy('games.created_at', 'desc')
	            ->limit($numberOfGames)
	            ->get();

		foreach($games as $game) {

			if($date = $this->returnGameReleaseDate($game->id)) {
				$date = date_create($date);
				$game->release_date = date_format($date,'d F Y');
			} else {
				$game->release_date = '- TBA -';
			}

			$game->developers = str_replace(',', ', ', $game->developers);
			$game->publishers = str_replace(',', ', ', $game->publishers);
			$game->platforms = str_replace(',', ', ', $game->platforms);
			$game->genres = str_replace(',', ', ', $game->genres);
		}

		return $games;
	}

	public function returnGame($game_id) {
		return $this->findOrFail($game_id);
	}

	public function returnGameReleaseDate($game_id) {
		$date = DB::table('game_platforms')->where('game_id', '=', $game_id)->pluck('release_date');
		if($date)
			return $date;
		return false;
	}

	public function returnGameArrayData($table, $column, $game_id){
		$datas = DB::table($table)->where('game_id', '=', $game_id)->get();
		$data_array = [];
		foreach($datas as $data){
			array_push($data_array, $data->$column);
		}
		return array_unique($data_array);
	}

	public function deleteGame($game_id) {

		//get game
		if( ! $game = $this->find($game_id)) {
			Session::put('adminDangerAlert', 'Cannot find game.');
			return;
		}

		$title = $game->title;

		//get game tag_id
		$tag = App::make('Tag');
		if( ! $tag_id = $tag->getTagId('game_tags', 'game_id', $game_id)) {
			Session::put('adminDangerAlert', 'The game tag for <b>'.$title.'</b> doesn\'t exist.');
			return;
		}

		$media_types = ['video', 'article'];

		//check if tagged in any media content
		foreach ($media_types as $media_type) {
			$count = DB::table($media_type.'_tags')
						->where('tag_id', '=', $tag_id)
						->count();
			if($count) {
				Session::put('adminInfoAlert', '<b>'.$title.'</b> cannot be deleted as it is tagged in either an article or video.');
				return;
			}
		}

		//delete game
		if($game->delete()) {
			Session::put('adminSuccessAlert', '<b>'.$title.'</b> has been deleted.');
			return;
		}

		Session::put('adminInfoAlert', 'Something went wrong attempting to delete <b>'.$title.'.</b>');
		return;
	}
}