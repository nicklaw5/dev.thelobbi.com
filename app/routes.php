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

Route::get('/oauth/session/facebook', 'OauthController@oauthFacebook');
Route::get('/oauth/session/twitter', 'OauthController@oauthTwitter');
Route::get('/oauth/session/twitch', 'OauthController@oauthTwitch');
Route::get('/oauth/session/google', 'OauthController@oauthGoogle');

Route::get('/logout', 'SessionsController@destroy');

//Route::get('/articles/{year}/{month}/{day}/{title}', 'ArticlesController@showDatedArticle');


// Route::group(array('prefix' => 'admin', function()
// {
//     Route::get('user', function()
//     {
//         return 'admin/user';
//     });
// }));

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {

    // Route::get('user', array('before' => 'auth', function()
    // {
    //     return 'we r here';
    // }));

    Route::get('user', function() {
        return 'we r here';
    });

});






//Route::resource('users', 'AdminController@users', array('before'=>'auth'));
Route::resource('oauth', 'OauthController');
Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');
Route::resource('videos', 'VideosController');
Route::resource('articles', 'ArticlesController');
