<?php
/**
 * Platform model
 */
class Platform extends Eloquent {

	protected $table = 'platforms';
	protected $fillable = [''];
	protected $guarded = [''];
	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'name' 					=> 	'required|unique:platforms',
		'abbreviation'			=>	'required|max:15',
		'description' 			=> 	'max:500', 
		'website'				=>  'url|max:150'
	];

	public function saveNewplatform($input) {
		$this->developer_id		  = $this->nullCheck((int)$input['developer']);
		$this->name 			  = $this->nullCheck($input['name']);
		$this->abbreviation		  = $this->nullCheck($input['abbreviation']);
		$this->abbreviation_slug  = $this->nullCheck(strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), $input['abbreviation'])));
		$this->description 		  = $this->nullCheck($input['description']);
		$this->website 			  = $this->nullCheck($input['website']);
		$this->save();

		return true;
	}

	public function updatePlatform($platform_id, $input) {
		DB::table($this->table)
            ->where('id', $platform_id)
            ->update(array(
            	'developer_id'		=> $this->nullCheck((int)$input['developer']),
            	'name'				=> $this->nullCheck($input['name']),
            	'abbreviation'		=> $this->nullCheck($input['abbreviation']),
            	'abbreviation_slug' => $this->nullCheck(strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), $input['abbreviation']))),
            	'description'		=> $this->nullCheck($input['description']),
            	'website'			=> $this->nullCheck($input['website'])
            ));
            
        return true;
	}

	public function returnPlatformsList() {
		$platforms = DB::table($this->table)
				->select(DB::raw('platforms.id, platforms.name, platforms.abbreviation, 
					platforms.abbreviation_slug, platforms.description, companies.name AS developer'))
				->leftJoin('companies', 'companies.id', '=', 'platforms.developer_id')
	            ->orderBy('platforms.created_at', 'desc')
	            ->get();

		return $platforms;
	}

	private function nullCheck($data) {
		if($data === '' || $data === null)
			return null;
		return $data;
	}
	
}