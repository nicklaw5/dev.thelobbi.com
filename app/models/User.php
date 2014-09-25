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

	public static $rules = [
		'email' => 'requied',
		'username' => 'required',
		'password' => 'required'
	];

}
