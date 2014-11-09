<?php

class CompaniesController extends BaseController {

	public function __construct(Logger $logger, Company $company) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'edit', 'destroy', 'listCompanies')));
		$this->logger 	= $logger;		
		$this->company 	= $company;
	}

	//GET 		companies 					companies.index
	public function index() {}

	public function listCompanies() {
		$numRows = null;
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
		// Validate the company data
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

	//GET 		companies/{company} 			companies.show
	public function show() {}

	//GET 		companies/{company_id}/edit 		companies.edit
	public function edit($company_id) {
		return View::make('companies.edit')
							->with('company', $this->company->find($company_id));
	}

	//PUT/PATCH companies/{company}			companies.update
	public function update($company_id) {
		
		if( ! $this->company->updateCompany($company_id, Input::all())) {
			$errorNum = $this->logger->createLog('CompaniesController', 'update', 'Failed to edit the copmany with an ID of "'.$company_id.'"', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', '<b>Error #'. $errorNum . '</b> - Something went wrong attempting to edit the game. Contact an administrator if this continues.');
			return Redirect::back();
		}

		//return successful update
		Session::put('adminSuccessAlert', '<b>'. Input::get('name') .'</b> has successfully been updated.');
		return Redirect::to('admin/companies');
	}

	//DELETE 	companies/{company_id}			companies.destroy
	public function destroy($company_id) {

		//Check if company is not assigned to any game/plaform before deleting
		if(Request::ajax())	{
			if(DB::table('game_developers')->where('developer_id', '=', $company_id)->get()
					|| 	DB::table('game_publishers')->where('publisher_id', '=', $company_id)->get()
					|| 	DB::table('platforms')->where('developer_id', '=', $company_id)->get()) {
				Session::put('adminInfoAlert', 'You cannot delete this company because it is currently assigned to a game or platform.');
			}
			else {
				if($company = $this->company->find($company_id)) {
					$name = $company->name;
					$company->delete();
					Session::put('adminSuccessAlert', '<b>'.$name.'</b> has successfully been deleted.');
				} else {
					Session::put('adminDangerAlert', 'Something went wrong attempting to delete <b>'.$name.'</b>.');
				}
			}
			return;
		}
	} 
	
}