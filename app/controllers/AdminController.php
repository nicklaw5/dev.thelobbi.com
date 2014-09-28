<?php

class AdminController extends BaseController {

	function __construct() {}

	public function index() {
		return View::make('admin.index');
	}

	
}