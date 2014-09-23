<?php

class SessionsController extends BaseController {
	
	protected $user;

	function __construct(User $user) {
		$this->user = $user;
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

	        //$message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
	        //echo $message. "<br/>";

	    //     array (size=11)
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

	        $this->user->facebook_id = $result['id'];
	        $this->user->email = $result['email'];
	        $this->user->username = 'nick';
	        $this->user->password = Hash::make('nl511988');
	        $this->user->email_verified = 1;
	        $this->user->gender = $result['gender'];
	        $this->user->active = 1;

	        $this->user-save();

	        return Redirect::to('/');
	        
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

	        $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
	        echo $message. "<br/>";

	        //Var_dump
	        //display whole array().
	        dd($result);

	    }
	    // if not ask for permission first
	    else {
	        // get googleService authorization
	        $url = $googleService->getAuthorizationUri();

	        // return to google login url
	        return Redirect::to( (string)$url );
	    }
	}

}
