<?php

class HomeController extends BaseController {

	function __construct() {}

	public function index() {
		return View::make('/home');
	}
}