<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * User model
 */

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $fillable = ['group_id', 'facebook_id', 'google_id', 'twitter_id',  'twitch_id',
						 'active', 'username', 'email', 'email_verified','password', 'gender'];

	protected $hidden = array('password', 'password_temp', 'email_code', 'remember_token');

	public $inputErrors;
	public $inputRules = [
		'username' 				=> 'required|min:4|max:25|unique:users',
		'email' 				=> 'requied|unique:users',
		'password' 				=> 'required|min:6',
		'confirm-password' 		=> 'same:password'
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
