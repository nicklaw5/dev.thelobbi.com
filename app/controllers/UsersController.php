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
			$username = (string)Input::get('username');
			$usernameFound = User::where('username', '=', $username)->first();
			if($usernameFound) {
				return 'exists';
			} else {
				return 'available';
			}	
		}

		// if(Input::has('username') && Input::has('email') && Input::has('password') && Input::has('confirm-password')) {

		// }

		if(Input::has('username') && Input::has('password') && Input::has('confirm-password')) {

			//Validate user input against User::$inputRules
			if(! $this->user->isValid(Input::all()))
				return Redirect::back()->withInput()->withErrors($this->user->inputErrors);
			
			$socialData = Session::get('socialData');

		  	switch ($socialData['provider']) {
			  	case "facebook":
			    	$this->user->facebook_id	= $socialData['id'];
			    	break;
			  	case "twitter":
			    	$this->user->twitter_id		= $socialData['id'];
			    	break;			  	
			  	case "google":
			  		$this->user->google_id		= $socialData['id'];
			    	break;
		    	case "twitch":
		    		$this->user->twitch_id		= $socialData['id'];
		    		break;
			  	default:
			  		// not setting social id,
			  		// user signed up with own email address
			    	break;
			}

		    $this->user->email 				= ($socialData['email'] === null)? null : $socialData['email'];
	        $this->user->username 			= Input::get('username');
	        $this->user->password 			= Hash::make(Input::get('password'));
	        $this->user->email_verified		= ($socialData['email'] === null)? (int)0 : (int)1;
	        $this->user->gender 			= $socialData['gender'];
	        $this->user->active 			= ($socialData['active'] === 1)? (int)1 : (int)0;
	        $this->user->ip_address 		= Request::getClientIp();

	        $this->user->save();
	        Session::forget('socialData');
	        //return 'user saved';

	        //Sign in new user
	        // $user_id = $this->getUserIdGivenSocialId('google', (string)$result['id']);
	        // Auth::attempt($user_id);
	        // return Redirect::to('/');

			//return Input::get('username') . ' + ' . Input::get('password') . ' + ' . Input::get('confirm-password');

	        if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
			    return Redirect::to('/admin/user');
			}
			
		} else {
			return 'nothing';
		}


		

		


		//Session::forget('socialId');
	}

	
}
