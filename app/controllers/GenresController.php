<?php

class GenresController extends BaseController {

	public function __construct(Logger $logger, Genre $genre) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'edit', 'destroy', 'listGenres')));
		$this->logger 	= $logger;		
		$this->genre 	= $genre;
	}

	//GET 		genres 					genres.index
	public function index() {}

	public function listGenres() {
		return View::make('genres.list')
					->with('genres', $this->genre->returnGenresList());
	}

	public function create() {
		return View::make('genres.create');
	}

	public function store() {
		
		// Validate the genre data
		if( ! $this->isValid(Input::all(), $this->genre))
			return Redirect::back()->withInput()->withErrors($this->genre->inputErrors);

		if( ! $this->genre->saveNewGenre(Input::all())) {
			//log error to logger
			$this->errorNum =  $this->logger->createLog('GenresController', 'store', 'Failed to add genre to DB.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to save the genre to the database. Contact an administrator if this continues.');
			return Redirect::back();
		}

		// Platform has been added successfully
		Session::put('adminSuccessAlert', '<b>'. Input::get('name') .'</b> has successfully been added.');
		return Redirect::back();
	}

	public function edit($genre_id) {
		return View::make('genres.edit')
					->with('genre', $this->genre->find($genre_id));
	}

	public function update($genre_id) {
		
		if( ! $this->genre->updateGenre($genre_id, Input::all())) {
			$errorNum = $this->logger->createLog('GenresController', 'update', 'Failed to edit the copmany with an ID of "'.$genre_id.'"', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', '<b>Error #'. $errorNum . '</b> - Something went wrong attempting to edit the genre. Contact an administrator if this continues.');
			return Redirect::back();
		}

		//return successful update
		Session::put('adminSuccessAlert', '<b>'. Input::get('name') .'</b> has successfully been updated.');
		return Redirect::to('/admin/genres');

	}

	public function destroy($genre_id) {

		//Check if genre is not assigned to any game before deleting
		if(Request::ajax())	{
			if(DB::table('game_genres')->where('genre_id', '=', $genre_id)->get()) {
				Session::put('adminInfoAlert', 'You cannot delete this genre because it is currently assigned to games.');
			}
			else {
				if($genre = $this->genre->find($genre_id)) {
					$name = $genre->name;
					$genre->delete();
					Session::put('adminSuccessAlert', '<b>'.$name.'</b> has successfully been deleted.');
				} else {
					Session::put('adminDangerAlert', 'Something went wrong attempting to delete <b>'.$name.'</b>.');
				}
			}
			return;
		}
	}
}