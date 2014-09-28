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
		if(Auth::attempt(array('username' => Input::get('username'),'password'=> Input::get('password')))) {
			if(Auth::user()->active === 0) {
				Auth::logout();
				Session::put('signinError', 'You have not yet activated your account.');
				return Redirect::to('/signin')->withInput();
			}

			return Redirect::intended();
		}

		//if unsuccessfull, return to signin page with error
		Session::put('signinError', 'Invalid username or password.');
		return Redirect::to('/signin')->withInput();
	}

	public function destroy() {
		Auth::logout();
		return Redirect::to('/');
	}

}
