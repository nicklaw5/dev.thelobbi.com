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

		$string = App::make('StringClass');

		$this->developer_id		  = intval($input['developer']);
		$this->name 			  = $string->nullifyAndStripTags($input['name']);
		$this->abbreviation		  = $string->nullifyAndStripTags($input['abbreviation']);
		$this->abbreviation_slug  = $string->slugify($this->abbreviation);
		$this->description 		  = $string->nullifyAndStripTags($input['description']);
		$this->website 			  = $string->nullifyAndStripTags($input['website']);
		$this->save();

		return true;
	}

	public function updatePlatform($platform_id, $input) {

		$string = App::make('StringClass');

		DB::table($this->table)
            ->where('id', $platform_id)
            ->update(array(
            	'developer_id'		=> intval($input['developer']),
            	'name'				=> $string->nullifyAndStripTags($input['name']),
            	'abbreviation'		=> $abbreviation = $string->nullifyAndStripTags($input['abbreviation']),
            	'abbreviation_slug' => $string->slugify($abbreviation),
            	'description'		=> $string->nullifyAndStripTags($input['description']),
            	'website'			=> $string->nullifyAndStripTags($input['website'])
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
	
}