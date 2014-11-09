<?php

class PlatformsController extends BaseController {

	public function __construct(Logger $logger, Platform $platform, Company $company) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'edit', 'destroy', 'listplatforms')));
		$this->company 	= $company;
		$this->logger 	= $logger;		
		$this->platform = $platform;
	}

	//GET 		platforms 					platforms.index
	public function index() {}

	public function listPlatforms() {
		return View::make('platforms.list')
					->with('platforms', $this->platform->returnPlatformsList());
	}

	//GET 		platforms/create 			platforms.create
	public function create() {
		return View::make('platforms.create')
					->with('companies'	, $this->returnModelList($this->company, 'name', 'id', 'name'));
	}

	//POST 		platforms 					platforms.store
	public function store() {

		// Validate the platform data
		if( ! $this->isValid(Input::all(), $this->platform))
			return Redirect::back()->withInput()->withErrors($this->platform->inputErrors);

		if( ! $this->platform->saveNewplatform(Input::all())) {
			//log error to logger
			$this->errorNum =  $this->logger->createLog('PlatformsController', 'store', 'Failed to add platform to DB.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to save the platform to the database. Contact an administrator if this continues.');
			return Redirect::back()->withInput();
		}

		// Platform has been added successfully
		Session::put('adminSuccessAlert', '<b>'. Input::get('name') .'</b> has successfully been added.');
		return Redirect::to('/admin/platforms');
	}

	//GET 		platforms/{platform} 			platforms.show
	public function show() {}

	//GET 		platforms/{platform_id}/edit 		platforms.edit
	public function edit($platform_id) {
		return View::make('platforms.edit')
								->with('companies'	, $this->returnModelList($this->company, 'name', 'id', 'name'))
								->with('platform', $this->platform->find($platform_id));
	}

	//PUT/PATCH platforms/{platform}			platforms.update
	public function update($platform_id) {
		
		if( ! $this->platform->updatePlatform($platform_id, Input::all())) {
			$errorNum = $this->logger->createLog('platformsController', 'update', 'Failed to edit the copmany with an ID of "'.$platform_id.'"', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', '<b>Error #'. $errorNum . '</b> - Something went wrong attempting to edit the game. Contact an administrator if this continues.');
			return Redirect::back();
		}

		//return successful update
		Session::put('adminSuccessAlert', '<b>'. Input::get('name') .'</b> has successfully been updated.');
		return Redirect::to('/admin/platforms');
	}

	//DELETE 	platforms/{platform_id}			platforms.destroy
	public function destroy($platform_id) {

		//Check if platform is not assigned to any game before deleting
		if(Request::ajax())	{
			if(DB::table('game_platforms')->where('platform_id', '=', $platform_id)->get()) {
				Session::put('adminInfoAlert', 'You cannot delete this platform because it is currently assigned to games.');
			}
			else {
				if($platform = $this->platform->find($platform_id)) {
					$name = $platform->name;
					$platform->delete();
					Session::put('adminSuccessAlert', '<b>'.$name.'</b> has successfully been deleted.');
				} else {
					Session::put('adminDangerAlert', 'Something went wrong attempting to delete <b>'.$name.'</b>.');
				}
			}
			return;
		}

	} 
	
}