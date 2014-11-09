<?php

/**
 * Event model
 */
class GamingEvent extends Eloquent {

	protected $table = 'events';
	protected $fillable = [''];
	protected $guarded = [''];
	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'event' 		=> 	'required|unique:events',
		'description' 	=> 	'max:500'
	];
}