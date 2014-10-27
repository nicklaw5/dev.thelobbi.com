<?php

/**
 * ArticleCategory model
 */
class Article extends Eloquent {
	
	protected $table = 'article_categories';
	protected $fillable = [];
	protected $guarded = [];

	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'category'				=>  'max:30|required|unique:video_categories',
		'description' 			=> 	'max:300'		
	];
}