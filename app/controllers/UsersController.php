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
		
		$username 			= (string)Input::get('username');
		$email 				= (string)Input::get('email');
		$password 			= (string)Input::get('password');
		$confirmPassword 	= (string)Input::get('confirm-password');

		// Check if username already exists upon AJAX request
		if(Request::ajax())	{
			if($this->usernameExists($username))
				return 'exists';
			return 'available';
		}

		// If user IS NOT signing up via social network
		if(isset($username) && isset($email) && isset($password) && isset($confirmPassword)) {

			//Validate user input against User::$inputRules
			if(! $this->user->isValid(Input::all()))
				return Redirect::to('users/create')->withInput()->withErrors($this->user->inputErrors);

			// Save new user to DB
			$this->createNewUser($username, $email, $password);

			// Send email verification link
/****/		$data = 'This is some data';
			//$recipient = ['email' => $email, 'username' => $username];
			Mail::queue('emails.welcome', ['data' => $data], function($message) use ($email, $username)	{
			    $message->to($email, $username)
			    		->subject('Welcome to The Lobbi!');
			});

			// Push new user to login page with 
			Session::flash('userCreateSuccess', 'Thanks for signing up and welcome. We\'ve emailed you your account activation link.
													You will need activate your account before signing in for the first time.');
			return Redirect::to('/login');
		}

		// If user IS signing up via social network
		if(isset($username) && isset($password) && isset($confirmPassword) && !isset($email)) {

			//Validate user input against User::$inputRules
			if(! $this->user->isValid(Input::all()))
				return Redirect::back()->withInput()->withErrors($this->user->inputErrors);
			
			$socialData = Session::get('socialData');

			// Save new user to DB
			$this->createNewUser($username, $socialData['email'], $password, $socialData['provider'], $socialData['id'], $socialData['gender']);

			// Remove social session data
			Session::forget('socialData');

			// Sign user if they signed up with a social network
			if(Auth::attempt(array('username' => $username,'password' => $password)))
				return Redirect::to('/');

		}
		
		App::abort(404);
		
	}

	/**
	 * Creates new user in the DB.
	 */
	private function createNewUser($username, $email, $password, $socialProvider = null, $socialId = null, $socialGender = null ) {
		
		switch ($socialProvider) {
		  	case "facebook":
		    	$this->user->facebook_id	= $socialId;
		    	break;
		  	case "google":
		  		$this->user->google_id		= $socialId;
		    	break;
	    	case "twitch":
	    		$this->user->twitch_id		= $socialId;
	    		break;
		  	default:
		  		//not signing up with social network
		    	break;
		}

        $this->user->username 			= $username;
        $this->user->email 				= $email;
        $this->user->password 			= Hash::make($password);
        $this->user->email_verified		= ($socialProvider !== null) ? (int)1 : (int)0;
        $this->user->gender 			= ($socialGender !== null) ? $socialGender : null;
        $this->user->active 			= ($socialProvider !== null) ? (int)1 : (int)0;
        $this->user->ip_address 		= Request::getClientIp();

        $this->user->save();
	}

	/**
	 * Returns TRUE if username already exists
	 * and FALSE otherwise.
	 */
	private function usernameExists($username) {
		$usernameFound = User::where('username', '=', $username)->first();
		if($usernameFound)
			return true;
		return false;
	}

}
