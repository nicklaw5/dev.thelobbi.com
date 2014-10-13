<?php

class CompaniesController extends BaseController {

	public function __construct(Logger $logger, Company $company) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'listCompanies')));

		$this->logger 	= $logger;		
		$this->company 	= $company;
	}

	//GET 		companies 					companies.index
	public function index() {}

	public function listCompanies() {
		$numRows = 50;
		$companies = $this->company->returnCompaniesList($numRows);

		//dd($companies);
		return View::make('companies.list')->with('companies', $companies);
	}

	//GET 		companies/create 			companies.create
	public function create() {
		return View::make('companies.create');
	}

	//POST 		companies 					companies.store
	public function store() {
		// Validate the game data
		if( ! $this->isValid(Input::all(), $this->company))
			return Redirect::back()->withInput()->withErrors($this->company->inputErrors);

		if( ! $this->company->saveNewCompany(Input::all())) {
			//log error to logger
			$this->errorNum =  $this->logger->createLog('GamesController', 'store', 'Failed to add company to DB.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to save the company to the database. Contact an administrator if this continues.');
			return Redirect::back();
		}

		Session::put('adminSuccessAlert', '<b>'. Input::get('name') .'</b> has successfully been added.');
		return Redirect::back();
	}

	//GET 		companies/{game} 			companies.show
	public function show() {}

	//GET 		companies/{game}/edit 		companies.edit
	public function edit() {}

	//PUT/PATCH companies/{game}			companies.update
	public function update() {}

	//DELETE 	companies/{game}			companies.delete
	public function destroy() {} 
	
}