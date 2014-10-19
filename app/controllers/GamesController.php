<?php

class GamesController extends BaseController {

	protected $game;
	protected $company;
	protected $platform;
	protected $genre;

	public function __construct(Logger $logger, Game $game,
								Company $company, Platform $platform, Genre $genre) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'edit', 'destroy', 'listGames')));

		$this->logger 	= $logger;
		$this->game 	= $game;
		$this->company 	= $company;
		$this->platform = $platform;
		$this->genre 	= $genre;
	}

	//GET 		games 					 games.index
	public function index() {
		return 'games.index';
	}

	public function listGames() {
		$numGames = 50;
		$games = $this->game->returnGamesList($numGames);
		return View::make('games.list')->with('games', $games);
	}

	//GET 		games/create 			games.create
	public function create() {
		$companies 	= $this->returnModelList($this->company, 'name', 'id', 'name');
		$platforms 	= $this->returnModelList($this->platform, 'abbreviation', 'id');
		$genres 	= $this->returnModelList($this->genre, 'name', 'id', 'name');

		return View::make('games.create')
				->with('companies'	, $companies)
				->with('platforms'	, $platforms)
				->with('genres'		, $genres);
	}

	//POST 		games 					games.store
	public function store() {

		// Validate the game data
		if( ! $this->isValid(Input::all(), $this->game))
			return Redirect::back()->withInput()->withErrors($this->game->inputErrors);

		//attempt to save game to DB
		if( ! $game_id = $this->game->saveNewGame(Input::all())) {
			
			//log error to logger
			$this->errorNum =  $this->logger->createLog('GamesController', 'store', 'Failed to add game to DB.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to save the game to the database. Contact an administrator if this continues.');
			return Redirect::back();
		}

		// attempt to add game, developers, publishers, platforms
		// and genres to their respective tables
		if( ! $this->validateAndInsertGameData($game_id, Input::get('developers'), 'game_developers', 'developer_id'))
			return Redirect::back();

		if( ! $this->validateAndInsertGameData($game_id, Input::get('publishers'), 'game_publishers', 'publisher_id'))
			return Redirect::back();

		if( ! $this->validateAndInsertGameData($game_id, Input::get('genres'), 'game_genres', 'genre_id'))
			return Redirect::back();

		if( ! $this->validateAndInsertGameData($game_id, Input::get('platforms'), 'game_platforms', 'platform_id'))
			return Redirect::back();
				
		if( ! $this->insertReleaseDate($game_id, Input::get('release_date')))
			return Redirect::back();		

		// return successful insertion
		Session::put('adminSuccessAlert', '<b>'. Input::get('title') .'</b> has successfully been added.');
		return Redirect::back();
	}

	//GET 		games/{game_slug} 			games.show
	public function show() {}


	//GET 		games/{game_id}/edit 		games.edit
	public function edit($game_id) {

		if($date = $this->game->returnGameReleaseDate($game_id)) {
			$date = date_create($date);
			$date = date_format($date,'D, d F Y');
		} else {
			$date = '';
		}

		return View::make('games.edit')
				->with('companies'	, $this->returnModelList($this->company, 'name', 'id', 'name'))
				->with('platforms'	, $this->returnModelList($this->platform, 'abbreviation', 'id'))
				->with('genres'		, $this->returnModelList($this->genre, 'name', 'id', 'name'))
				->with('game'		, $this->game->returnGame($game_id))
				->with('game_devs'	, $this->game->returnGameArrayData('game_developers', 'developer_id', $game_id))
				->with('game_pubs'	, $this->game->returnGameArrayData('game_publishers', 'publisher_id', $game_id))
				->with('game_gens'	, $this->game->returnGameArrayData('game_genres', 'genre_id', $game_id))
				->with('game_plats'	, $this->game->returnGameArrayData('game_platforms', 'platform_id', $game_id))
				->with('game_rDates', $date);
	}

	//PUT/PATCH games/{game_id}			games.update
	public function update($game_id) {
		// Validate the game data
		// if( ! $this->isValid(Input::all(), $this->game))
		// 	return Redirect::back()->withInput()->withErrors($this->game->inputErrors);

		//Attempt to update the game
		if( ! $this->game->updateGame($game_id, Input::all())) {
			$errorNum = $this->logger->createLog('GamesController', 'update', 'Failed to edit the game with an ID of "'.$game_id.'"', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', '<b>Error #'. $errorNum . '</b> - Something went wrong attempting to edit the game. Contact an administrator if this continues.');
			return Redirect::back();
		}

		// attempt to add game, developers, publishers, platforms
		// and genres to their respective tables
		if( ! $this->validateAndInsertGameData($game_id, Input::get('developers'), 'game_developers', 'developer_id'))
			return Redirect::back();

		if( ! $this->validateAndInsertGameData($game_id, Input::get('publishers'), 'game_publishers', 'publisher_id'))
			return Redirect::back();

		if( ! $this->validateAndInsertGameData($game_id, Input::get('genres'), 'game_genres', 'genre_id'))
			return Redirect::back();

		if( ! $this->validateAndInsertGameData($game_id, Input::get('platforms'), 'game_platforms', 'platform_id'))
			return Redirect::back();
				
		if( ! $this->insertReleaseDate($game_id, Input::get('release_date')))
			return Redirect::back();

		//return successful update
		Session::put('adminSuccessAlert', '<b>'. Input::get('title') .'</b> has successfully been updated.');
		return Redirect::to('admin/games');		
	}

	//DELETE 	games/{game_id}			games.delete
	public function destroy($game_id) {

		if(Request::ajax())	{
			
			if($game = $this->game->find($game_id)) {
				$title = $game->title;
				$game->delete();
				Session::put('adminSuccessAlert', '<b>'.$title.'</b> has successfully been deleted.');
			} else {
				Session::put('adminDangerAlert', 'Something went wrong attempting to delete <b>'.$title.'</b>.');	
			}
			return;
		}
	}

	private function validateAndInsertGameData($game_id, $gameData, $table, $column) {
		if(empty($gameData))
			return true;
		$gameData = array_map('intval', $gameData);
		if( ! $this->game->insertGameData($game_id, $gameData, $table, $column)) {
			$errorNum = $this->logger->createLog('GamesController', 'validateAndInsertGameData', 'Failed to add data to "'.$table.'" table.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', '<b>Error #'. $errorNum . '</b> - Something went wrong attempting to save the game to the database. Contact an administrator if this continues.');
			return false;
		}
		return true;
	}

	private function insertReleaseDate($game_id, $input) {
		if(empty($input))
			return true;
		// Insert game release dates (more to come)
		$date = date('Y-m-d', strtotime($input));
		DB::table('game_platforms')
	       	->where('game_id', $game_id)
         	->update(array('release_date' => $date));
        return true;
	}
	
}