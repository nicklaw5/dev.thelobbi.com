<?php
/**
 * Compnay model
 */
class Company extends Eloquent {

	protected $table = 'companies';
	protected $fillable = [''];
	protected $guarded = [''];
	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'name' 					=> 	'required|unique:companies',
		'description' 			=> 	'max:500',
		'website' 				=>	'url|max:150',
		'facebook' 				=>	'url|max:150',
		'twitter' 				=>	'url|max:150',
		'twitch' 				=>	'url|max:150',
		'google_plus' 			=>	'url|max:150',
		'youtube' 				=>	'url|max:150',
		'logo'					=>	'max:200'
	];

	public function returnCompaniesList($numberOfCompanies) {
		$companies = DB::table($this->table)
				->select(DB::raw('companies.id, companies.name, companies.description'))
	            ->orderBy('companies.created_at', 'desc')
	            ->limit($numberOfCompanies)
	            ->get();

		return $companies;
	}

	public function saveNewCompany($input) {

		$this->name 			= $this->nullCheck($input['name']);
		$this->description 		= $this->nullCheck($input['description']);
		$this->website 			= $this->nullCheck($input['website']);
		$this->facebook 		= $this->nullCheck($input['facebook']);
		$this->twitter 			= $this->nullCheck($input['twitter']);
		$this->twitch 			= $this->nullCheck($input['twitch']);
		$this->google_plus 		= $this->nullCheck($input['google_plus']);
		$this->youtube 			= $this->nullCheck($input['youtube']);
		$this->logo 			= $this->nullCheck($input['logo']);
		$this->save();

		return true;
	}

	private function nullCheck($data) {
		if($data === '' || $data === null)
			return null;
		return $data;
	}


	
}