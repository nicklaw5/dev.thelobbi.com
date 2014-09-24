<?php

class UsersController extends BaseController {
	
	function __construct(User $user) {
		$this->user = $user;
	}

	public function store() {
		
	}
}