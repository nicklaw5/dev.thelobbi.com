<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * This migration script creates all initial
 * database schema.
 */
class CreateDatabaseTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		// Create 'groups' table
		Schema::create('groups', function($t) {		//['registered user', 'moderator', 'junior journalist', 'senior journalist', 'junior admin', 'senior admin']
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('group_name', 50);
			$t->string('permissions', 500);
			$t->string('description', 500)->nullable();
			$t->timestamps();
		});

		// Create 'users' table
		Schema::create('users', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('group_id')->unsigned()->default(1);
			$t->foreign('group_id')->references('id')->on('groups')->onDelete('no action')->onUpdate('cascade');
			$t->string('facebook_id', 60)->unique()->nullable();
			$t->string('google_id', 60)->unique()->nullable();
			$t->string('twitter_id', 60)->unique()->nullable();
			$t->string('twitch_id', 60)->unique()->nullable();
			$t->boolean('active')->default(false);
			$t->string('username', 20)->unique();
			$t->string('email', 150)->unique()->nullable();
			$t->boolean('email_verified')->default(false);
			$t->string('email_code', 60)->nullable();
			$t->string('first_name', 15)->nullable();
			$t->string('last_name', 15)->nullable();
			$t->string('password', 60);
			$t->string('password_temp', 60)->nullable();
			$t->string('ip_address', 20)->nullable();
			$t->string('avatar', 200)->nullable();
			$t->text('biography')->nullable();
			$t->string('gender', 6)->nullable();
			$t->string('country')->nullable();
			$t->rememberToken();
			$t->timestamps();
		});
		
		// Create 'games' table
		Schema::create('games', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('title', 150);
			$t->string('title_slug', 200);
			$t->string('description', 500)->nullable();
			$t->string('website', 150)->nullable();
			$t->string('facebook', 150)->nullable();
			$t->string('twitter', 150)->nullable();
			$t->string('twitch', 150)->nullable();
			$t->string('google_plus', 150)->nullable();
			$t->string('youtube', 150)->nullable();
			$t->string('box_art', 200)->nullable();
			$t->string('title_image', 200)->nullable();
			$t->decimal('price_at_launch', 5, 2)->nullable();
			$t->timestamps();
		});

		// Create 'video_categories' table
		Schema::create('video_categories', function($t) {	//['trailer', 'gameplay', 'interview', 'review', 'previews', 'other']
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('category', 30)->unique();
			$t->string('description', 300)->nullable();
			$t->timestamps();
		});

		// Create 'videos' table
		Schema::create('videos', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('video_category')->unsigned();
			$t->foreign('video_category')->references('id')->on('video_categories')->onDelete('restrict')->onUpdate('cascade');
			$t->integer('author_id')->unsigned();
			$t->foreign('author_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
			$t->string('title', 150)->unique();
			$t->string('title_slug', 160)->unique();
			$t->string('description', 350);
			$t->string('video', 250)->unique();
			$t->string('video_short', 250)->nullable();
			$t->string('image', 250);			
			$t->integer('views')->default(0);
			$t->dateTime('posted_at');
			$t->boolean('is_published')->default(false);
			$t->dateTime('published_at')->nullable();
			$t->integer('last_edit_by')->nullable();
			$t->string('last_edit_comment', 250)->nullable();
			$t->timestamps();
		});

		// Create 'article_categories' table
		Schema::create('article_categories', function($t) {	//['news', 'review', 'interview', 'feature', 'opinion']
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('category', 30)->unique();
			$t->string('description', 300)->nullable();
			$t->timestamps();
		});

		// Create 'articles' table
		Schema::create('articles', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('article_category')->unsigned();
			$t->foreign('article_category')->references('id')->on('article_categories')->onDelete('no action')->onUpdate('cascade');
			$t->integer('author_id')->unsigned();
			$t->foreign('author_id')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
			$t->string('title', 150)->unique();
			$t->string('title_slug', 160)->unique();
			$t->string('description', 300);
			$t->text('body');
			$t->string('main_image', 250);
			$t->string('feature_image', 250)->nullable();  // feature images are used for reviews and feature articles
			$t->double('review_score')->nullable();
			$t->integer('video')->unsigned()->nullable();
			$t->foreign('video')->references('id')->on('videos')->onDelete('restrict')->onUpdate('cascade');
			$t->integer('views')->default(0);
			$t->dateTime('posted_at');
			$t->boolean('is_published')->default(false);
			$t->dateTime('published_at')->nullable();
			$t->integer('last_edit_by')->nullable();
			$t->string('last_edit_comment', 250)->nullable();
			$t->timestamps();
		});

		// Create 'events' table
		Schema::create('events', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('event', 100)->unique();
			$t->string('event_slug', 150)->unique();
			$t->string('description', 300)->nullable();
			$t->string('website', 150)->nullable();
			$t->date('start_date');
			$t->date('end_date');
			$t->integer('created_by');
			$t->timestamps();
		});

		// Create 'comments' table
		Schema::create('comments', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('parent_id')->nullable();
			$t->integer('user_id')->unsigned();
			$t->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
			$t->text('comment');
			$t->timestamps();
		});

		// Create 'flag_types' table
		Schema::create('flag_types', function($t) {		//['spam', 'abusive', 'innapropriate', 'troll']
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('flag_type', 30);
			$t->string('flag_description');
			$t->timestamps();
		});

		// Create 'flagged_comments' table
		Schema::create('flagged_comments', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('flag_id');
			$t->integer('comment_id')->unsigned();
			$t->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('flag_type_id')->unsigned();
			$t->foreign('flag_type_id')->references('id')->on('flag_types')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('flagger_id')->unsigned();
			$t->foreign('flagger_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$t->text('flagger_reason');
			$t->timestamps();
		});

		// Create 'settings' table
		Schema::create('settings', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('name', 50);
			$t->string('value', 100);
			$t->string('description', 250)->nullable();
			$t->timestamps();
		});

		// Create 'companies' table
		Schema::create('companies', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('name', 150);
			$t->string('name_slug', 200);
			$t->string('description', 500)->nullable();
			$t->string('website', 150)->nullable();
			$t->string('facebook', 150)->nullable();
			$t->string('twitter', 150)->nullable();
			$t->string('twitch', 150)->nullable();
			$t->string('google_plus', 150)->nullable();
			$t->string('youtube', 150)->nullable();
			$t->string('logo', 300)->nullable();
			$t->timestamps();
		});

		// Create 'platforms' table
		Schema::create('platforms', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('developer_id')->unsigned();
			$t->foreign('developer_id')->references('id')->on('companies')->onDelete('no action')->onUpdate('cascade');
			$t->string('name', 60);
			$t->string('abbreviation', 15);
			$t->string('abbreviation_slug', 20);
			$t->string('description', 500)->nullable();
			$t->string('website', 150)->nullable();
			$t->timestamps();
		});

		// Create 'genres' table
		Schema::create('genres', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('name', 100);
			$t->string('name_slug', 110);
			$t->string('description', 500)->nullable();
			$t->timestamps();
		});

		// Create 'game_developers' table
		Schema::create('game_developers', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('game_id')->unsigned();
			$t->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('developer_id')->unsigned();
			$t->foreign('developer_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
			$t->timestamps();
		});	

		// Create 'game_publishers' table
		Schema::create('game_publishers', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('game_id')->unsigned();
			$t->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('publisher_id')->unsigned();
			$t->foreign('publisher_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
			$t->timestamps();
		});	

		// Create 'game_platforms' table
		Schema::create('game_platforms', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('game_id')->unsigned();
			$t->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('platform_id')->unsigned();
			$t->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade')->onUpdate('cascade');
			$t->date('release_date')->nullable();
			$t->timestamps();
		});

		// Create 'game_genres' table
		Schema::create('game_genres', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('game_id')->unsigned();
			$t->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('genre_id')->unsigned();
			$t->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
			$t->timestamps();
		});

		// Create 'tag_types' table
		Schema::create('tag_types', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('type', 30);
		});		

		// Create 'tags' table
		Schema::create('tags', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('tag_type')->unsigned();
			$t->foreign('tag_type')->references('id')->on('tag_types')->onDelete('restrict')->onUpdate('cascade');
		});

		// Create 'game_tags' table
		Schema::create('game_tags', function($t) {
			$t->engine = 'InnoDB';
			$t->integer('tag_id')->unsigned();
			$t->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('game_id')->unsigned();
			$t->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
		});	

		// Create 'platform_tags' table
		Schema::create('platform_tags', function($t) {
			$t->engine = 'InnoDB';
			$t->integer('tag_id')->unsigned();
			$t->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('platform_id')->unsigned();
			$t->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade')->onUpdate('cascade');
		});

		// Create 'company_tags' table
		Schema::create('company_tags', function($t) {
			$t->engine = 'InnoDB';
			$t->integer('tag_id')->unsigned();
			$t->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('company_id')->unsigned();
			$t->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
		});	

		// Create 'event_tags' table
		Schema::create('event_tags', function($t) {
			$t->engine = 'InnoDB';
			$t->integer('tag_id')->unsigned();
			$t->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('event_id')->unsigned();
			$t->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
		});	

		// Create 'article_tags' table
		Schema::create('article_tags', function($t) {
			$t->engine = 'InnoDB';
			$t->integer('article_id')->unsigned();
			$t->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('tag_id')->unsigned();
			$t->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('tag_type')->unsigned();
			$t->foreign('tag_type')->references('tag_type')->on('tags')->onDelete('cascade')->onUpdate('cascade');
		});

		// Create 'video_tags' table
		Schema::create('video_tags', function($t) {
			$t->engine = 'InnoDB';
			$t->integer('video_id')->unsigned();
			$t->foreign('video_id')->references('id')->on('videos')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('tag_id')->unsigned();
			$t->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
			$t->integer('tag_type')->unsigned();
			$t->foreign('tag_type')->references('tag_type')->on('tags')->onDelete('cascade')->onUpdate('cascade');
		});

		// Create 'logger' table
		Schema::create('logger', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('user_id');
			$t->string('ip_address', 20);
			$t->string('class', 50);
			$t->string('method', 50);
			$t->string('description', 500);
			$t->string('url', 100);
			$t->string('uri', 100);
			$t->integer('priority');
			$t->dateTime('created_at');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{	
		// Drop foreign keys
		Schema::table('users', function($t) {
    		$t->dropForeign('users_group_id_foreign');
		});

		Schema::table('news', function($t) {
    		$t->dropForeign('news_user_id_foreign');
		});

		Schema::table('videos', function($t) {
    		$t->dropForeign('videos_user_id_foreign');
		});		

		Schema::table('reviews', function($t) {
			$t->dropForeign('reviews_user_id_foreign');							 
		});

		Schema::table('comments', function($t) {
			$t->dropForeign('comments_user_id_foreign');							 
		});

		Schema::table('flagged_comments', function($t) {
			$t->dropForeign('flagged_comments_comment_id_foreign');
			$t->dropForeign('flagged_comments_flag_type_id_foreign');
			$t->dropForeign('flagged_comments_flagger_id_foreign');							 
		});

		Schema::table('games', function($t) {
			$t->dropForeign('games_developer_foreign');
			$t->dropForeign('games_publisher_foreign');
		});

		Schema::table('game_developers', function($t) {
			$t->dropForeign('game_developers_game_id_foreign');
			$t->dropForeign('game_developers_developer_id_foreign');
		});

		Schema::table('game_publishers', function($t) {
			$t->dropForeign('game_publishers_game_id_foreign');
			$t->dropForeign('game_publishers_publisher_id_foreign');
		});

		Schema::table('game_platforms', function($t) {
			$t->dropForeign('game_platforms_game_id_foreign');
			$t->dropForeign('game_platforms_platform_id_foreign');
		});

		Schema::table('platforms', function($t) {
			$t->dropForeign('platforms_developer_foreign');
		});

		// Drop all above tables
		Schema::drop('groups');
		Schema::drop('users');	
		Schema::drop('news');
		Schema::drop('videos');
		Schema::drop('video_categories');
		Schema::drop('reviews');
		Schema::drop('events');
		Schema::drop('comments');
		Schema::drop('flag_types');
		Schema::drop('flagged_comments');
		Schema::drop('settings');
		Schema::drop('companies');
		Schema::drop('games');
		Schema::drop('platforms');
		Schema::drop('genres');
		Schema::drop('game_developers');
		Schema::drop('game_publishers');
		Schema::drop('game_platforms');
		Schema::drop('game_genres');
		Schema::drop('logger');
	}
}
