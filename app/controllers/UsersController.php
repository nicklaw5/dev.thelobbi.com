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

		// Check if username already exists upon AJAX request
		if(Request::ajax())	{
			if($this->usernameExists(Input::get('username')))
				return 'exists';
			return 'available';
		}

		// Validate user input against User::$inputRules
		if(! $this->user->isValid($input = Input::all()))
			return Redirect::to('/signup')->withInput()->withErrors($this->user->inputErrors);

		// if user IS NOT signing up via social network
		if( ! Session::has('socialData')) {
			$this->registerNonSocialUser($input);

		// else if user IS signing up via social network
		} else {
			$this->registerSocialUser($input);

		}

		return Redirect::to('/');

	}

	private function registerSocialUser($input) {

		$username 	= (string) $input['username'];
		$email 		= (string) $input['email'];
		$password 	= (string) $input['password'];
		
		// Fetch user social data and destroy it at the same time
		$socialData = Session::pull('socialData', 'default');

		// Save new user to DB
		$this->createNewUser($username, $email, $password, $socialData['provider'], $socialData['id'], $socialData['gender']);

		// Sign user if they signed up with a social network
		Auth::attempt(array('username' => $username,'password' => $password));
		
		// Create welcome message
		Session::flash('welcomeMessage', 'Welcome message/Tour message: Something here...');
		
		return true;
	}

	private function registerNonSocialUser($input) {

		$username 	= (string) $input['username'];
		$email 		= (string) $input['email'];
		$password 	= (string) $input['password'];

		// Save new user to DB
		$this->createNewUser($username, $email, $password);

		// Send email verification link
// /****/	$data = 'This is some data';
// 		Mail::queue('emails.welcome', ['data' => $data], function($message) use ($email, $username)	{
// 		    $message->to($email, $username)
// 		    		->subject('Welcome to The Lobbi!');
// 		});

		// Set welcome message
		Session::flash('userCreateSuccess', 'Thanks for signing up and welcome. We\'ve emailed you your account activation link.
												You will need activate your account before signing in for the first time.');
		return true;
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
