<?php

/**
 * Message model
 */
class Message extends Eloquent {

	protected $table = 'messages';
	protected $fillable = [];
	protected $guarded = [];

	protected $hidden = array('');

}