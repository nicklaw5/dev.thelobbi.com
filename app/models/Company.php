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

	public function returnCompaniesList($numberOfCompanies = null) {
		$companies = DB::table($this->table)
				->select(DB::raw('companies.id, companies.name, companies.name_slug, companies.description'))
	            ->orderBy('companies.created_at', 'desc')
	            ->limit($numberOfCompanies)
	            ->get();

		return $companies;
	}

	public function saveNewCompany($input) {

		$this->name 			= $this->nullCheck($input['name']);
		$this->name_slug		= $this->nullCheck(strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), $input['name'])));
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

	public function updateCompany($company_id, $input) {
		
		//update game data
		DB::table($this->table)
            ->where('id', $company_id)
            ->update(array(
            	'name'				=> $this->nullCheck($input['name']),
            	'name_slug'			=> $this->nullCheck(strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), $input['name']))),
				'description' 		=> $this->nullCheck($input['description']),
				'website' 			=> $this->nullCheck($input['website']),
				'facebook' 			=> $this->nullCheck($input['facebook']),
				'twitter' 			=> $this->nullCheck($input['twitter']),
				'twitch' 			=> $this->nullCheck($input['twitch']),
				'google_plus' 		=> $this->nullCheck($input['google_plus']),
				'youtube' 			=> $this->nullCheck($input['youtube']),
				'logo' 				=> $this->nullCheck($input['logo'])
        	)
        );
        return true;
    }

	private function nullCheck($data) {
		if($data === '' || $data === null)
			return null;
		return $data;
	}
	
}