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

	public function returnCompaniesList() {
		$companies = DB::table($this->table)
				//->select(DB::raw('companies.id, companies.name, companies.name_slug, companies.description'))
	            ->orderBy('companies.name', 'asc')
	            ->paginate(10);

		return $companies;
	}

	public function saveNewCompany($input) {

		$string = App::make('StringClass');

		$this->name 			= $string->nullifyAndStripTags($input['name']);
		$this->name_slug		= $string->slugify($this->name);
		$this->description 		= $string->nullifyAndStripTags($input['description'], '<b><em><s><br><a><strong>');
		$this->website 			= $string->nullifyAndStripTags($input['website']);
		$this->facebook 		= $string->nullifyAndStripTags($input['facebook']);
		$this->twitter 			= $string->nullifyAndStripTags($input['twitter']);
		$this->twitch 			= $string->nullifyAndStripTags($input['twitch']);
		$this->google_plus 		= $string->nullifyAndStripTags($input['google_plus']);
		$this->youtube 			= $string->nullifyAndStripTags($input['youtube']);
		$this->logo 			= $string->nullifyAndStripTags($input['logo']);
		$this->save();


		$company_id = $this->returnGameData('id', 'name', $this->name);

		//add event as a tag
		$tag = App::make('Tag');
		if($tag->createNewTag($this->table, $company_id))
			return true;
		return false;
	}

	public function returnGameData($want, $field, $value) {
		return DB::table($this->table)->where($field, $value)->pluck($want);
	}

	public function updateCompany($company_id, $input) {
		
		$string = App::make('StringClass');

		//update game data
		DB::table($this->table)
            ->where('id', $company_id)
            ->update(array(
            	'name'				=> $name = $string->nullifyAndStripTags($input['name']),
            	'name_slug'			=> $string->slugify($name),
				'description' 		=> $string->nullifyAndStripTags($input['description'], '<b><em><s><br><a><strong>'),
				'website' 			=> $string->nullifyAndStripTags($input['website']),
				'facebook' 			=> $string->nullifyAndStripTags($input['facebook']),
				'twitter' 			=> $string->nullifyAndStripTags($input['twitter']),
				'twitch' 			=> $string->nullifyAndStripTags($input['twitch']),
				'google_plus' 		=> $string->nullifyAndStripTags($input['google_plus']),
				'youtube' 			=> $string->nullifyAndStripTags($input['youtube']),
				'logo' 				=> $string->nullifyAndStripTags($input['logo'])
        	)
        );
        return true;
    }
	
}