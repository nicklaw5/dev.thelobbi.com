<?php

class AdminController extends BaseController {

	function __construct() {
		//make sure the user is an admin		
		$this->before('admin');
	}

	public function index() {
		return View::make('admin.index');
	}
}