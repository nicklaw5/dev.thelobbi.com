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


Route::get('/facebook-signin', 'SessionsController@loginWithFacebook');
Route::get('/google-signin', 'SessionsController@loginWithGoogle');
Route::get('/twitter-signin', 'SessionsController@loginWithTwitter');
Route::get('/twitch-signin', 'SessionsController@loginWithTwitch');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/articles/{year}/{month}/{day}/{title}', 'ArticlesController@showDatedArticle');


Route::get('/admin', 'AdminController@index');

// Route::filter('admin',  array('before' => 'auth|admin', function()
// {
//     //user must be an admin to access these pages
    
// }));

Route::when('admin/*', 'admin');



//Route::resource('users', 'AdminController@users', array('before'=>'auth'));
Route::resource('sessions', 'SessionsController');
Route::resource('videos', 'VideosController');
Route::resource('articles', 'ArticlesController');
Route::resource('admin', 'AdminController');
