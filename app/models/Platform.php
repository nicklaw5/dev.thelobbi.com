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