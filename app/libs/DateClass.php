<?php

class DateClass {
	
	/**
	* Returns a new date.
	*/
	public function newDate() {
		return date('Y-m-d H:i:s');
	}

	/**
	* Returns formatted date.
	*/
	public function formatDate($date, $format) {
		return date_format(date_create($date), $format);
	}
}