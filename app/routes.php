<?php


Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/login', 'SessionsController@loginWithFacebook');
Route::resource('sessions', 'SessionsController');