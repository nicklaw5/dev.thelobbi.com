<?php

class Articles extends Eloquent {

	protected $table = 'articles';
	protected $hidden = array();
	protected $guarded = array('id');

}