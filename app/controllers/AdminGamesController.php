<?php

class AdminGamesController extends BaseController {

	protected $baseUrl;

	public function __construct() {
		$this->baseUrl = 'http://dev.thelobbi.com/public';
	}

	//GET:HEAD users 					users.index
	public function index() {
		return View::make('admin.games.index')->with('baseUrl', $this->baseUrl);
	}

	//GET:HEAD users/create 			users.create
	public function create() {}

	//POST users 						users.store
	public function store() {}

	//GET:HEAD users/{users} 			users.show
	public function show() {}

	//GET:HEAD users/{users}/edit 		users.edit
	public function edit() {}

	//PUT/PATCH users/{users}			users.update
	public function update() {}

	//DELETE users/{users}				users.delete
	public function destroy() {} 
	
}