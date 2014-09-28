<?php

class AdminGamesController extends BaseController {

	public function __construct() {}

	//GET:HEAD users 					users.index
	public function index() {
		return View::make('admin.games.index');
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