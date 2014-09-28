<?php

Route::get('/', 'HomeController@index');


//Route::get('/articles/{year}/{month}/{day}/{title}', 'ArticlesController@showDatedArticle');

//guest only routes
Route::group(array('before' => 'guest'), function() {

	Route::get('/login', 'SessionsController@create');
	Route::get('/signup', 'UsersController@create');

	Route::get('/oauth/session/facebook', 'OauthController@oauthFacebook');
	Route::get('/oauth/session/twitter', 'OauthController@oauthTwitter');
	Route::get('/oauth/session/twitch', 'OauthController@oauthTwitch');
	Route::get('/oauth/session/google', 'OauthController@oauthGoogle');

});

//signined in only routes
Route::group(array('before' => 'auth'), function() {
		
	Route::get('/logout', 'SessionsController@destroy');

});

// admin only routes
//Route::group(array('prefix' => 'admin', 'before' => 'admin'), function() {

	Route::resource('admin', 'AdminController');
    
//});


Route::resource('oauth', 'OauthController');
Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');
Route::resource('videos', 'VideosController');
Route::resource('articles', 'ArticlesController');
