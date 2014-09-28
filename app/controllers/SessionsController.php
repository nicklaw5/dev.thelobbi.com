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
			'password' 	=> Input::get('password'),
			'active'	=> (int) 1
			)
		))
			return Redirect::intended();

		//if unsuccessfull, return to login with error
		Session::put('signinError', 'Invalid username or password.');
		return Redirect::to('/signin')->withInput();
	}

	public function destroy() {
		Auth::logout();
		return Redirect::to('/');
	}

}
