<?php

class SessionsController extends BaseController {
	
	protected $user;

	function __construct(User $user) {
		//$this->beforeFilter('csrf', array('on' => 'store') );
		$this->user = $user;
	}

	public function create() {
		return View::make('sessions.create');
	}

	public function store() {

		//TODO: AJAX login method for logging in through Disqus. Return success to close disqus window and reload page.
		
		// attempt to sign the user in		
		if(Auth::attempt(array('username' => Input::get('username'),'password'=> Input::get('password')))) {

			//if user NOT verified return them to sigin page
			if( ! $this->user->isEmailVerified()) {
				Auth::logout();
				Session::put('signinError', 'You have not yet activated your account. Click the below link if you require it to be eamil to you again.');
				return Redirect::to('/signin')->withInput();
			}

			return Redirect::intended();
		}

		// if unsuccessfull, return to signin page with error
		Session::put('signinError', 'Invalid username or password.');
		return Redirect::to('/signin')->withInput();
	}

	public function destroy() {
		Auth::logout();
		return Redirect::to('/');
	}
}
