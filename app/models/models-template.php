<?php

class Users extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token')];

	/**
	 * The attributes excluded from being updated via CRUD actions.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * The attributes that can be updated via CRUD actions.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'password', 'email')];

	/**
	 * These rules help define errors when validating data.
	 *
	 * @var array
	 */
	public static $rules = [
		'username' => 'required',
		'password' => 'required'
	];


}