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
		if(Request::ajax())	{
			if(isset(Input::get('checkUsername')) && Input::get('checkUsername') === '') {
				$username = (string)Input::get('username');
				$usernameFound = User::where('username', '=', $username)->first();
				if($usernameFound) {
					return 'exists';
				} else {
					return 'available';
				}	
			} else {
				return Input::get('username');		
			}
		}




		//Session::forget('socialId');
	}

	
}
