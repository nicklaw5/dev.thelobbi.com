<?php

class SessionsController extends BaseController {
	
	protected $user;
	
	// An array of acceptable social login methods
	private $allowableSocialAuths = ['facebook', 'google', 'twitter', 'twitch'];

	function __construct(User $user) {
		$this->user = $user;
	}

	public function create() {
		return View::make('sessions.create');
	}

	public function store($social_id = NULL) {

	}

	public function destroy() {
		Auth::logout();
		return Redirect::to('/');
	}
	
	/**
	 * Pack social data into a session variable.
	 */
	private function packSocialData($social_provider = null, $social_id, $social_username = null, 
										$social_email, $social_gender = null, $user_active) {
		$socialData = array(
		  	'provider' 			=> (string)$social_provider,		//  'facebook', 'twitch', 'twitter', 'google' or null
		  	'id' 				=> (string)$social_id,				//  '453546'
		  	'username'			=> (string)$social_username,		//	'my_username' or null
		  	'email' 			=> (string)$social_email,			//	'my_username@example.com'
		  	'gender' 			=> (string)$social_gender,			//	'male', 'female' or null
		  	'active'			=> (int)$user_active				// 	 1 (true) or 0 (false)
		);

		//set session
		Session::forget('socialData');
		Session::put('socialData', $socialData);

		// make sure the session data has been set
		if(Session::has('socialData') && count(Session::has('socialData')) === 6) {
			return true;		
		}
		return false;
	}


	/**
	 * This function checks to see if we are able
	 * sign in the user using a specified social network.
	 * The user's 'user_id' is returned if possible.
	 * False otherwise.
	 */
	private function getUserIdGivenSocialId($socialNetwork, $socialNetworkId) {
		if(! in_array($socialNetwork, $this->allowableSocialAuths))
			return false;
		$user_id = User::where($socialNetwork . '_id', '=', $socialNetworkId)->first();
		if($user_id)
			return $user_id;
		return false;
	}

	/**
	 * Login user with Facebook
	 *
	 * @return void
	 */
	public function loginWithFacebook() {

	    // get data from input
	    $code = Input::get('code');

	    // get fb service
	    $fb = OAuth::consumer('Facebook');

	    // if code is provided get user data and sign in
	    if ( !empty($code) ) {

	        // This was a callback request from facebook, get the token
	        $token = $fb->requestAccessToken($code);

	        // Send a request with it
	        $response = json_decode($fb->request('/me'), true);

	        // Check if user has already registered with
	        // this social network.
	        $user_id = $this->getUserIdGivenSocialId('facebook', (string)$response['id']);

	        // If they do exist, sign them in and return
	        // them to the the page they came from.
	        if($user_id) {

	        	Auth::login($user_id);   	
				return Redirect::back();

			// else, store the user's social data in a session
			// variable and have them create a new username
			// and password
			} else {
				// create session variable
				$this->packSocialData('facebook', $response['id'], null, $response['email'], $response['gender'], 1);
				return View::make('users.create');
		    }
	        
	    }
	    // if not ask for permission first
	    else {
	        // get fb authorization
	        $url = $fb->getAuthorizationUri();

	        // return to facebook login url
	         return Redirect::to((string)$url);
	    }
	}


	/**
	 * Login user with Twitter
	 *
	 * @return void
	 */
	public function loginWithTwitter() {

	    // get data from input
	    $token = Input::get( 'oauth_token' );
	    $verify = Input::get( 'oauth_verifier' );

	    // get twitter service
	    $tw = OAuth::consumer( 'Twitter' );

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $token ) && !empty( $verify ) ) {

	        // This was a callback request from twitter, get the token
	        $token = $tw->requestAccessToken( $token, $verify );

	        // Send a request with it
	        $result = json_decode( $tw->request( 'account/verify_credentials.json' ), true );

	        $message = 'Your unique Twitter user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
	        echo $message. "<br/>";

	        //Var_dump
	        //display whole array().
	        dd($result);

	    }
	    // if not ask for permission first
	    else {
	        // get request token
	        $reqToken = $tw->requestRequestToken();

	        // get Authorization Uri sending the request token
	        $url = $tw->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));

	        // return to twitter login url
	        return Redirect::to( (string)$url );
	    }
	}


	/**
	 * Login user with Google
	 *
	 * @return void
	 */
	public function loginWithGoogle() {

	    // get data from input
	    $code = Input::get( 'code' );

	    // get google service
	    //$googleService = OAuth::consumer( 'Google' );
	    $googleService = OAuth::consumer('Google', 'http://dev.thelobbi.com/google-signin');

	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from google, get the token
	        $token = $googleService->requestAccessToken( $code );

	        // Send a request with it
	        $response = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

	    	// dd($response)

	        // check if user already exists
	        $user_id = $this->getUserIdGivenSocialId('google', (string)$result['id']);

	        if($user_id) {

	        	// user already exists, sign them in
	        	Auth::login($user_id);
				return Redirect::back();
	        
			} else {

				// put google data into session var from use later
				$this->packSocialData('google', $response['id'], null, $response['email'], $response['gender'], 1);

				// send user to account create screen
				return View::make('users.create');
		    }

	    }
	    // if not ask for permission first
	    else {
	        // get googleService authorization
	        $url = $googleService->getAuthorizationUri();

	        // return to google login url
	        return Redirect::to( (string)$url );
	    }
	}


	/**
	 * Login user with Google
	 *
	 * @return void
	 */
	public function loginWithTwitch() {
		
		$return_url = 'http://dev.thelobbi.com/twitch-signin';
		$client_id = 'nsvagmf9u0fw2pquajzkd1cxa0fbc6b';
		$client_secret = 'rl40owzw5nhhv66oqzj7ibdtj5as7xa';

		// get data from input
	    $code = Input::get( 'code' );

	    //if code is provided get user data and sign in or sign them up
	    if ( ! empty( $code ) ) {

	    	//get token
	    	$url = 'https://api.twitch.tv/kraken/oauth2/token';
	    	$data = array(
				'client_id' => $client_id, 
				'client_secret' => $client_secret,
				'grant_type' => 'authorization_code',
				'redirect_uri' => $return_url,
				'code' => $code
				);

			// use key 'http' even if you send the request to https://...
			$options = array(
			    'http' => array(
			        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			        'method'  => 'POST',
			        'content' => http_build_query($data),
			    ),
			);
			$context  = stream_context_create($options);
			$result = json_decode(file_get_contents($url, false, $context), true);

			//dd($result);

			// fetch user object from twitch
			$curl = curl_init();
		    curl_setopt($curl, CURLOPT_URL,"https://api.twitch.tv/kraken/user");
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			    'Accept: application/vnd.twitchtv.v3+json',
			    'Authorization: OAuth ' . $result['access_token']
			    ));
		    $response = json_decode(curl_exec ($curl), true);
		    curl_close ($curl);

		    // dd($response);

		    // Check if user already exists
	        $user_id = $this->getUserIdGivenSocialId('twitch', (string)$response['_id']);

	        // if user user already registered with twitch sign them in
	        if($user_id) {

	        	Auth::login($user_id);
				return Redirect::back();
	        
	        // else have them create a new account
			} else {
				// put twitch data into session var from use later
				$this->packSocialData('twitch', $response['_id'], $response['display_name'], $response['email'], null, 1);

				// send user to account create screen
				return View::make('users.create');
			}
		// if not ask for permission first
	    } else {
	    	
	    	// request permission from user's twitch account
			$request_url = 'https://api.twitch.tv/kraken/oauth2/authorize?response_type=code&client_id=' . $client_id . '&redirect_uri=' . $return_url . '&scope=user_read';
			return Redirect::to($request_url);
	    }	    

	}

}
