<?php

Route::get('/', function() { 
	return View::make('home');
});

/**
* VIDEO TEMPLATE
*/
Route::get('/video-template', function(){
	return View::make('video-template');
});

Route::get('/oauth/session/facebook', 'SessionsController@oauthFacebook');
Route::get('/oauth/session/twitter', 'SessionsController@oauthTwitter');
Route::get('/oauth/session/twitch', 'SessionsController@oauthTwitch');
Route::get('/oauth/session/google', 'SessionsController@oauthGoogle');

// Route::get('/facebook-signin', 'SessionsController@loginWithFacebook');
// Route::get('/google-signin', 'SessionsController@loginWithGoogle');
// Route::get('/twitter-signin', 'SessionsController@loginWithTwitter');
// Route::get('/twitch-signin', 'SessionsController@loginWithTwitch');
Route::get('/logout', 'SessionsController@destroy');

//Route::get('/articles/{year}/{month}/{day}/{title}', 'ArticlesController@showDatedArticle');


//Route::resource('users', 'AdminController@users', array('before'=>'auth'));
Route::resource('oauth', 'OauthController');
Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');
Route::resource('videos', 'VideosController');
Route::resource('articles', 'ArticlesController');
