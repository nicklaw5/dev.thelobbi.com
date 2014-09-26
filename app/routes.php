<?php

Route::get('/', 'HomeController@index');

Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/oauth/session/facebook', 'OauthController@oauthFacebook');
Route::get('/oauth/session/twitter', 'OauthController@oauthTwitter');
Route::get('/oauth/session/twitch', 'OauthController@oauthTwitch');
Route::get('/oauth/session/google', 'OauthController@oauthGoogle');



//Route::get('/articles/{year}/{month}/{day}/{title}', 'ArticlesController@showDatedArticle');

Route::group(array('prefix' => 'admin', 'before' => 'admin'), function() {

    Route::get('/', function() {
        return 'admin dash';
    });

});

Route::resource('admin', 'AdminController');
Route::resource('oauth', 'OauthController');
Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');
Route::resource('videos', 'VideosController');
Route::resource('articles', 'ArticlesController');
