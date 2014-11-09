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
				 	trim($string)
				 	)
				);
	}

	/**
	* Converts $string to NULL if
	* $string is empty.
	*/
	public function nullifyAndStripTags($string, $allowableTags = null) {
		if($string === '' || $string === null)
			return null;
		return htmlentities(strip_tags(trim($string), $allowableTags));
	}

	/**
	* Converts $string to htmlentities
	*/
	public function htmlEncode($string) {
		return htmlentities(trim($string));
	}
		
}