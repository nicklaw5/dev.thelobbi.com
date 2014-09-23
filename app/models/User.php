<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * 
 */

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $fillable = ['group_id', 'facebook_id', 'active', 'username', 'email', 'email_verified', 'password', 'gender']

	protected $hidden = array('password');

	public static $rules = [
		'username' => 'required',
		'password' => 'required'
	];

}
