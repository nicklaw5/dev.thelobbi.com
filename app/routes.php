<?php


Route::get('/', function()
{
	return View::make('hello');
});



Route::get('/facebook-signin', 'SessionsController@loginWithFacebook');
Route::get('/google-signin', 'SessionsController@loginWithGoogle');
Route::get('/oauth2callback', 'SessionsController@loginWithGoogle');

Route::resource('sessions', 'SessionsController');