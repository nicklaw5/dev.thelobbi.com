<?php

// Content Route Resoureces
Route::resource('articles',     'ArticlesController');
Route::resource('games', 		    'GamesController');
Route::resource('users', 		    'UsersController');
Route::resource('sessions', 	  'SessionsController');
Route::resource('companies', 	  'CompaniesController');
Route::resource('platforms', 	  'PlatformsController');
Route::resource('genres', 		  'GenresController');
Route::resource('videos', 		  'VideosController');
Route::resource('events',       'GamingEventsController');
Route::resource('messages',     'MessagesController');

Route::get('/', 'HomeController@index');

Route::get('/signout', 'SessionsController@destroy');

//public content routes
Route::get('/news/{year}/{month}/{day}/{title_slug}', 'ArticlesController@showNewsArticle');
Route::get('/reviews/{year}/{month}/{day}/{title_slug}', 'ArticlesController@showReviewArticle');
Route::get('/interviews/{year}/{month}/{day}/{title_slug}', 'ArticlesController@showInterviewArticle');
Route::get('/features/{year}/{month}/{day}/{title_slug}', 'ArticlesController@showFeatureArticle');
Route::get('/opinions/{year}/{month}/{day}/{title_slug}', 'ArticlesController@showOpinionArticle');
Route::get('/videos/{year}/{month}/{day}/{title_slug}', 'VideosController@showVideo');  

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

	// Dashboard
  	Route::get('/', 'AdminController@index');

  	// Games
  	Route::get('/games', 'GamesController@listGames');
  	Route::get('/games/create', 'GamesController@create');
  	Route::get('/games/{game_id}/edit', 'GamesController@edit');

  	// Companies
  	Route::get('/companies', 'CompaniesController@listCompanies');
  	Route::get('/companies/create', 'CompaniesController@create');
  	Route::get('/companies/{company_id}/edit', 'CompaniesController@edit');

  	// Platforms
  	Route::get('/platforms', 'PlatformsController@listPlatforms');
  	Route::get('/platforms/create', 'PlatformsController@create');
  	Route::get('/platforms/{platform_id}/edit', 'PlatformsController@edit');

  	// Genres
  	Route::get('/genres', 'GenresController@listGenres');
  	Route::get('/genres/create', 'GenresController@create');
  	Route::get('/genres/{genre_id}/edit', 'GenresController@edit');

    // Events & Calendar
    Route::get('/events', 'GamingEventsController@listEvents');
    Route::get('/events/create', 'GamingEventsController@create');
    Route::get('/events/{event_id}/edit', 'GamingEventsController@edit');
    Route::get('/calendar', 'GamingEventsController@calendar');

  	// Videos
  	Route::get('/videos', 'VideosController@listVideos');
  	Route::get('/videos/create', 'VideosController@create');
  	Route::get('/videos/{video_id}/edit', 'VideosController@edit');
    Route::post('/videos/{video_id}/publish', 'VideosController@publish');
    Route::post('/videos/{video_id}/unpublish', 'VideosController@unpublish');

    // Articles
    Route::get('/articles', 'ArticlesController@listArticles');
    Route::get('/articles/create', 'ArticlesController@create');
    Route::get('/articles/{article_id}/edit', 'ArticlesController@edit');
    Route::post('/articles/{article_id}/publish', 'ArticlesController@publish');
    Route::post('/articles/{article_id}/unpublish', 'ArticlesController@unpublish');

    // Messages
    Route::get('/messages', 'MessagesController@index');
    Route::post('/messages/sender-delete', 'MessagesController@senderDelete');
    Route::post('/messages/recipient-delete', 'MessagesController@recipientDelete');
    Route::get('/messages/sent', 'MessagesController@sent');
    Route::get('/messages/trash', 'MessagesController@trash');
    Route::post('/messages/trash', 'MessagesController@trashMessages');
    Route::post('/messages/return', 'MessagesController@returnMessages');
    Route::get('/messages/create', 'MessagesController@create');
    Route::get('/messages/{message_id}', 'MessagesController@show');
    Route::get('/messages/{message_id}/sent', 'MessagesController@showSent');
    Route::get('/messages/{message_id}/received', 'MessagesController@showReceived');

});