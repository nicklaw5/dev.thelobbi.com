<?php


Route::get('/', function()
{
	return View::make('hello');
});



Route::get('/facebook-signin', 'SessionsController@loginWithFacebook');
Route::get('/google-signin', 'SessionsController@loginWithGoogle');
Route::get('/twitter-signin', 'SessionsController@loginWithTwitter');
Route::get('/twitch-signin', 'SessionsController@loginWithTwitch');

Route::resource('sessions', 'SessionsController');