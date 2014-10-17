<?php

// Content Route Resoureces
Route::resource('news', 		'NewsController');
Route::resource('reviews', 		'ReviewsController');
Route::resource('interviews', 	'InterviewsController');
Route::resource('videos', 		'VideosController');


Route::resource('games', 		'GamesController');
Route::resource('users', 		'UsersController');
Route::resource('sessions', 	'SessionsController');
Route::resource('companies', 	'CompaniesController');
Route::resource('platforms', 	'PlatformsController');

Route::resource('groups', 		'VideosController');

//Route::resource('admin/games', 'AdminGamesController');

Route::get('/', 'HomeController@index');

Route::get('/signout', 'SessionsController@destroy');


//Route::get('/articles/{year}/{month}/{day}/{title}/{game_id}', 'ArticlesController@showDatedArticle');

//guest only routes
Route::group(array('before' => 'guest'), function() {

	Route::get('/signin', 'SessionsController@create');
	Route::get('/signup', 'UsersController@create');

	Route::get('/oauth/session/facebook', 'OauthController@oauthFacebook');
	Route::get('/oauth/session/twitch', 'OauthController@oauthTwitch');
	Route::get('/oauth/session/google', 'OauthController@oauthGoogle');

});

//signined in only routes
Route::group(array('before' => 'auth'), function() {
	

});

// Admin only routes
Route::group(array('prefix' => 'admin' , 'before' => 'admin' ), function() {

  	Route::get('/', 'AdminController@index');
  	Route::get('/games', 'GamesController@listGames');
  	Route::get('/games/create', 'GamesController@create');
  	Route::get('/games/{game_id}/edit', 'GamesController@edit');

  	Route::get('/companies', 'CompaniesController@listCompanies');
  	Route::get('/companies/create', 'CompaniesController@create');
  	Route::get('/companies/{company_id}/edit', 'CompaniesController@edit');
});