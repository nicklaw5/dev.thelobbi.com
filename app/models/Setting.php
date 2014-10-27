<?php

/**
 * Setting model
 */
class Setting extends Eloquent {

	protected $table = 'settings';
	protected $fillable = [];
	protected $guarded = [];

	protected $hidden = array('');

	public function autoplayVideos() {
		return DB::table($this->table)->where('name', 'autoplay_videos')->pluck('value');
	}
}