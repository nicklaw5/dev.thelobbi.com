<?php
/**
 * Game model
 */
class Game extends Eloquent {

	protected $table = 'games';
	protected $fillable = [''];
	protected $guarded = [''];

	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'title' 				=> 	'required|unique:games',
		'description' 			=> 	'max:500',
		'website' 				=>	'url|max:100',
		'facebook' 				=>	'url|max:100',
		'twitter' 				=>	'url|max:100',
		'twitch' 				=>	'url|max:100',
		'google_plus' 			=>	'url|max:100',
		'youtube' 				=>	'url|max:100',
		'box_art' 				=> 	'url|max:200',
		'title_image' 			=> 	'url|max:200',
		'price_at_launch' 		=> 	'Regex:/[^0-9.]/'
	];

	/**
	 * Checks user input values against
	 * required rules.
	 */
	public function isValid($input) {

		$validation = Validator::make($input, $this->inputRules);

		if($validation->passes())
			return true;
		
		$this->inputErrors = $validation->messages();
		return false;
	}

	public function saveNewGame($input) {

		$this->title 			= $this->nullCheck($input['title']);
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

	private function nullCheck($input) {
		if($input === '' || $input === null)
			return null;
		return $input;
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

	// public function insertGameDevelopers($game_id, $developers) {
	// 	$time = date('Y-m-d H:i:s');
	// 	foreach ($developers as $developer) {
	// 		DB::table('game_developers')->insert(array(
	// 				'game_id' 		=> $game_id,
 //    				'developer_id' 	=> (int)$developer,
	// 				'created_at'	=> $time,
	// 				'updated_at'	=> $time
 //    		));
	// 	}
	// 	return true;
	// }

	// public function insertGamePublishers($game_id, $publishers) {
	// 	$time = date('Y-m-d H:i:s');
	// 	foreach ($publishers as $publisher) {
	// 		DB::table('game_publishers')->insert(array(
	// 				'game_id' 		=> $game_id,
 //    				'publisher_id' 	=> (int)$publisher),
	// 				'created_at'	=> $time,
	// 				'updated_at'	=> $time,
 //    		);
	// 	}
	// 	return true;
	// }

	// public function insertGamePlatforms($game_id, $genres) {
	// 	$time = date('Y-m-d H:i:s');
	// 	foreach ($genres as $genre) {
	// 		DB::table('game_genres')->insert(array(
	// 				'game_id' 		=> $game_id,
 //    				'genre_id' 	=> (int)$genre),
	// 				'created_at'	=> $time,
	// 				'updated_at'	=> $time,
 //    		);
	// 	}
	// 	return true;
	// }

	// public function insertGameGenres($game_id, $genres) {
	// 	$time = date('Y-m-d H:i:s');
	// 	foreach ($genres as $genre) {
	// 		DB::table('game_genres')->insert(array(
	// 				'game_id' 		=> $game_id,
 //    				'genre_id' 	=> (int)$genre),
	// 				'created_at'	=> $time,
	// 				'updated_at'	=> $time,
 //    		);
	// 	}
	// 	return true;
	// }



}