<?php

/**
 * Video Categories model
 */
class VideoCategory extends Eloquent {

	protected $table = 'video_categories';
	protected $fillable = [];
	protected $guarded = [];

	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'category'				=>  'max:30|required|unique:video_categories',
		'description' 			=> 	'max:300'		
	];

}