<?php

/**
 * This model is used to create, remove and track a user's
 * gaming profiles. For example, their usernames for Xbox 
 * Live, PSN, Steam, Nintendo Wii U, Battle.net, iOS Game 
 * Centre, etc.
 */
class UserProfiles extends Eloquent {

	protected $table = 'user_profiles';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * The attributes excluded from being updated via CRUD actions.
	 *
	 * @var array
	 */
	protected $guarded = array('id');

	/**
	 * The attributes that can be updated via CRUD actions.
	 *
	 * @var array
	 */
	protected $fillable = array('username', 'email');

}