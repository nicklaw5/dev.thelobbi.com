<?php

class SessionsController extends BaseController {
	
	protected $user;

	function __construct(User $user) {
		$this->user = $user;
	}

	public function create() {
		return View::make('sessions.create');
	}

	public function store() {

		// attempt to sign the user in, if successful
		// return them to the page they came from
		if(Auth::attempt(array(
				'username' 	=> Input::get('username'),
				'active'	=> (int) 1
				)
			)) {
			//if unsuccessfull, return to login with error
			Session::put('signinError', 'You haven\'t yet activated you account.');
			return Redirect::to('/login')->withInput();
		}


		if(Auth::attempt(array(
			'username' 	=> Input::get('username'),
			'password' 	=> Input::get('password'),
			)
		))
			return Redirect::back();

		//if unsuccessfull, return to login with error
		Session::put('signinError', 'Invalid username or password.');
		return Redirect::to('/login')->withInput();


		
	}

	public function destroy() {
		Auth::logout();
		return Redirect::to('/');
	}

}
