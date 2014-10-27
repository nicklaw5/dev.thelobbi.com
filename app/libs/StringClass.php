<?php

class StringClass {
	/**
	* Converts $string to pretty URL format
	* eg. "this-is-my-pretty-url"
	*/
	public function slugify($string) {
		return
			strtolower(
				preg_replace(
					array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
				 	array('', '-', ''),
				 	$string
				 	)
				);
	}

	/**
	* Converts $string to NULL if
	* $string is empty.
	*/
	public function nullifyAndStrip($string) {
		if($string === '' || $string === null)
			return null;
		return strip_tags($string);
	}
	
}