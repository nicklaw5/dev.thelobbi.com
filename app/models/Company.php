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
		'abbreviation'			=>	'max:15',
		'description' 			=> 	'max:500',
		'logo'					=>	'max:200',
		'website' 				=>	'url|max:100'
	];

	/**
	 * Checks user input values against
	 * required rules.
	 */
	public function isValid($input) {
		$validation = Validator::make($input, $this->inputRules);
		if($validation->passes())
			return true;
		$this->inputErrors = $validation->messages();
		return false;
	}
	
}