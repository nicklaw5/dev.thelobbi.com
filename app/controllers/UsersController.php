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
				
		//check if username already exists
		if(isset(Input::get('checkUsername')) && Input::get('checkUsername') === '') {
			if(Request::ajax())	{
				$username = (string)Input::get('username');
				$usernameFound = User::where('username', '=', $username)->first();
				if($usernameFound) {
					return 'exists';
				} else {
					return 'available';
				}	
			}
		}


		return Input::get('username');




		//Session::forget('socialId');
	}

	
}
