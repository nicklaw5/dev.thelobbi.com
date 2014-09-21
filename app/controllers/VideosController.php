<?php

class VideosController extends BaseController {

	public function index() {
		return "holla";
	}

	public function show() {
		return View::make('videos.show');
	}
}