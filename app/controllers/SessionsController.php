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
	    //$fb = OAuth::consumer('Facebook','http://url.to.redirect.to');

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty($code) ) {

	        // This was a callback request from facebook, get the token
	        $token = $fb->requestAccessToken($code);

	        // Send a request with it
	        $result = json_decode($fb->request('/me'), true);

	    	// array (size=11)
			  // 'id' => string '10152691339070739' (length=17)
			  // 'email' => string 'nick_law@tpg.com.au' (length=19)
			  // 'first_name' => string 'Nicholas' (length=8)
			  // 'gender' => string 'male' (length=4)
			  // 'last_name' => string 'Law' (length=3)
			  // 'link' => string 'https://www.facebook.com/app_scoped_user_id/10152691339070739/' (length=62)
			  // 'locale' => string 'en_US' (length=5)
			  // 'name' => string 'Nicholas Law' (length=12)
			  // 'timezone' => int 10
			  // 'updated_time' => string '2014-09-16T23:09:58+0000' (length=24)
			  // 'verified' => boolean true

	        // Check if user has already registered with
	        // this social network.
	        $user_id = $this->getUserIdGivenSocialId('facebook', (string)$result['id']);

	        // If they do exist, sign them in and return
	        // them to the the page they came from.
	        if($user_id) {

	        	Auth::login($user_id);     	
				return Redirect::back();

			// else, store the user's social data in a session
			// variable and have them create a new username
			// and password
			} else {
				Session::forget('socialId');
				Session::put('socialId', $result);
				return View::make('users.create');	
				/*
				// Register new user
				$this->user->facebook_id 			= (string)$result['id'];
		        $this->user->email 					= (string)$result['email'];
		        $this->user->username 				= (string)'nick';
		        $this->user->password 				= (string)Hash::make('nl511988');
		        $this->user->email_verified 		= (int)1;
		        $this->user->gender 				= (string)$result['gender'];
		        $this->user->active 				= (int)1;
		        $this->user->save();

		        // Sign in new user
		        $user_id = $this->getUserIdGivenSocialId('facebook', (string)$result['id']);
		        Auth::login($user_id);
		        return Redirect::to('/');
		        */
		    }
	        
	        //Var_dump
	        //display whole array().
	        //dd($result);

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

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from google, get the token
	        $token = $googleService->requestAccessToken( $code );

	        // Send a request with it
	        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

	        //$message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
	        //echo $message. "<br/>";

	    //     array (size=10)
			  // 'id' => string '108170707386043389590' (length=21)
			  // 'email' => string 'practicalprogrammingdotnet@gmail.com' (length=36)
			  // 'verified_email' => boolean true
			  // 'name' => string 'Nicholas Law' (length=12)
			  // 'given_name' => string 'Nicholas' (length=8)
			  // 'family_name' => string 'Law' (length=3)
			  // 'link' => string 'https://plus.google.com/108170707386043389590' (length=45)
			  // 'picture' => string 'https://lh4.googleusercontent.com/-OUDVnZ8U6fc/AAAAAAAAAAI/AAAAAAAAADI/KasU61wNQwY/photo.jpg' (length=92)
			  // 'gender' => string 'male' (length=4)
			  // 'locale' => string 'en-GB' (length=5)

	        //Check if user already exists
	        $user_id = $this->getUserIdGivenSocialId('google', (string)$result['id']);

	        if($user_id) {

	        	Auth::login($user_id);
				//return Auth::user();        	
				return Redirect::to('/');

	        // User already exists, sign them in
	        //if(Auth::attempt($result['id'])) {

	        //	return Auth::user();

			} else {

				// Register new user
				$this->user->google_id 			= (string)$result['id'];
		        $this->user->email 				= (string)$result['email'];
		        $this->user->username 			= (string)'nick';
		        $this->user->password 			= (string)Hash::make('nl511988');
		        $this->user->email_verified 	= (int)1;
		        $this->user->gender 			= (string)$result['gender'];
		        $this->user->active 			= (int)1;
		        $this->user->save();

		        //Sign in new user
		        $user_id = $this->getUserIdGivenSocialId('google', (string)$result['id']);
		        Auth::login($user_id);
		        return Redirect::to('/');
		    }

	        //Var_dump
	        //display whole array().
	        //dd($result);

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

	    if ( !empty( $code ) ) {

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

			//$access_request = 'https://[your registered redirect URI]/#access_token=[an access token]&scope=[authorized scopes]'


			// curl -H 'Accept: application/vnd.twitchtv.v3+json' -H 'Authorization: OAuth <access_token>' \
			// -X GET https://api.twitch.tv/kraken/user


			// create a new cURL resource
			$curl = curl_init();
		    curl_setopt($curl, CURLOPT_URL,"https://api.twitch.tv/kraken/user");
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			    'Accept: application/vnd.twitchtv.v3+json',
			    'Authorization: OAuth ' . $result['access_token']
			    ));
		    $user = json_decode(curl_exec ($curl), true);
		    curl_close ($curl);
		    return $user['id'];
			

	    	//https://api.twitch.tv/kraken/oauth2/token

			// POST Body (URL-encoded)

			// client_id=[your client ID]
			// &client_secret=[your client secret]
			// &grant_type=authorization_code
			// &redirect_uri=[your registered redirect URI]
			// &code=[code received from redirect URI]

	    } else {
	    	

	    	//request permission
			$request_url = 'https://api.twitch.tv/kraken/oauth2/authorize?response_type=code&client_id=' . $client_id . '&redirect_uri=' . $return_url . '&scope=user_read';
			return Redirect::to($request_url);

	    }	    

	}

}
