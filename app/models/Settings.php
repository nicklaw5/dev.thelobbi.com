<?php

class Settings extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'settings';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public function __construct() {}

	//GET:HEAD users 					users.index
	public function index() {}

	//GET:HEAD users/create 			users.create
	public function create() {}

	//POST users 						users.store
	public function store() {}

	//GET:HEAD users/{users} 			users.show
	public function show() {}

	//GET:HEAD users/{users}/edit 		users.edit
	public function edit() {}

	//PUT users/{users}					users.update
	public function update() {}

	//PATCH users/{users}				users.update
	public function update() {}	

	//DELETE users/{users}				users.delete
	public function destroy() {} 

}