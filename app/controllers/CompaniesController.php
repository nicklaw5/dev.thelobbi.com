<?php

class CompaniesController extends BaseController {

	public function __construct() {
		$this->beforeFilter('admin', array('only' => array('create')));
	}

	//GET 		companies 					companies.index
	public function index() {}

	//GET 		companies/create 			companies.create
	public function create() {
		return View::make('companies.create');

	}

	//POST 		companies 					companies.store
	public function store() {}

	//GET 		companies/{game} 			companies.show
	public function show() {}

	//GET 		companies/{game}/edit 		companies.edit
	public function edit() {}

	//PUT/PATCH companies/{game}			companies.update
	public function update() {}

	//DELETE 	companies/{game}			companies.delete
	public function destroy() {} 
	
}