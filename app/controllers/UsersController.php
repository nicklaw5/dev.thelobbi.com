<?php

class UsersController extends BaseController {
	
	protected $user;

	function __construct(User $user) {
		$this->user = $user;
	}


	public function create() {
		return View::make('users.create');
	}


	public function store() {

		$username = (string)Input::get('username');

		//check if username already exists
		if(Request::ajax())	{
			
			$usernameFound = User::where('username', '=', $username)->first();

			if($usernameFound) {
				return 'exists';
			} else {
				return 'available';
			}
			
		}
	}

	
}
