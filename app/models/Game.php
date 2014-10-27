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

		$this->title 			= $this->nullCheck($input['title']);
		$this->title_slug		= $this->nullCheck(strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), $input['title'])));
		$this->description 		= $this->nullCheck($input['description']);
		$this->website 			= $this->nullCheck($input['website']);
		$this->facebook 		= $this->nullCheck($input['facebook']);
		$this->twitter 			= $this->nullCheck($input['twitter']);
		$this->twitch 			= $this->nullCheck($input['twitch']);
		$this->google_plus 		= $this->nullCheck($input['google_plus']);
		$this->youtube 			= $this->nullCheck($input['youtube']);
		$this->box_art 			= $this->nullCheck($input['box_art']);
		$this->title_image 		= $this->nullCheck($input['title_image']);
		$this->price_at_launch 	= $this->nullCheck(preg_replace('/[^0-9.]/', '', $input['price_at_launch']));
		$this->save();

		return $this->returnGameData('id', 'title', $input['title']);
	}

	private function nullCheck($data) {
		if($data === '' || $data === null)
			return null;
		return $data;
	}

	public function returnGameData($data, $field, $value) {
		return DB::table($this->table)->where($field, $value)->pluck($data);
	}

	public function insertGameData($game_id, $datas, $table, $column) {
		$time = date('Y-m-d H:i:s');
		foreach ($datas as $data) {
			DB::table($table)->insert(array(
					'game_id' 		=> $game_id,
    				$column		 	=> (int)$data,
					'created_at'	=> $time,
					'updated_at'	=> $time
    		));
		}
		return true;
	}

	public function updateGame($game_id, $input) {
		
		//update game data
		DB::table($this->table)
            ->where('id', $game_id)
            ->update(array(
            	'title'				=> $this->nullCheck($input['title']),
            	'title_slug'		=> $this->nullCheck(strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), $input['title']))),
				'description' 		=> $this->nullCheck($input['description']),
				'website' 			=> $this->nullCheck($input['website']),
				'facebook' 			=> $this->nullCheck($input['facebook']),
				'twitter' 			=> $this->nullCheck($input['twitter']),
				'twitch' 			=> $this->nullCheck($input['twitch']),
				'google_plus' 		=> $this->nullCheck($input['google_plus']),
				'youtube' 			=> $this->nullCheck($input['youtube']),
				'box_art' 			=> $this->nullCheck($input['box_art']),
				'title_image' 		=> $this->nullCheck($input['title_image']),
				'price_at_launch' 	=> $this->nullCheck(preg_replace('/[^0-9.]/', '', $input['price_at_launch']))
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
				$game->release_date = date_format($date,'D, d F Y');
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
}