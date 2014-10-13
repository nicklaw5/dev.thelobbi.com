<?php

class GamesController extends BaseController {

	protected $game;
	protected $company;
	protected $platform;
	protected $genre;

	public function __construct(Logger $logger, Game $game,
								Company $company, Platform $platform, Genre $genre) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'listGames')));

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

		if( ! $this->validateAndInsertGameData($game_id, Input::get('platforms'), 'game_platforms', 'platform_id')) {
			return Redirect::back();
		}
		else{
			
			// Insert game release dates (more to come)
			$date = date('Y-m-d', strtotime(Input::get('release_date')));

			DB::table('game_platforms')
            ->where('game_id', $game_id)
            ->update(array('release_date' => $date));
		}
		
		// return successful insertion
		Session::put('adminSuccessAlert', '<b>'. Input::get('title') .'</b> has successfully been added.');
		return Redirect::back();
	}

	//GET 		games/{game} 			games.show
	public function show() {}


	//GET 		games/{gameId}/edit 	games.edit
	public function edit($gameId) {

		return 'editing game ' . $gameId;
	}

	//PUT/PATCH games/{game}			games.update
	public function update() {}

	//DELETE 	games/{game}			games.delete
	public function destroy() {} 


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
	
}