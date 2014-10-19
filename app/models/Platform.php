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
		'abbreviation'			=>	'max:15',
		'description' 			=> 	'max:500'
	];

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