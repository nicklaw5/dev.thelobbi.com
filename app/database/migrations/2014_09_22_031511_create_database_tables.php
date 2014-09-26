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
			$t->string('description', 250)->nullable();
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
			$r->string('ip_address', 20)->nullable();
			$t->string('avatar', 200)->nullable();
			$t->text('biography')->nullable();
			$t->string('gender', 6)->nullable();
			$t->string('country')->nullable();
			$t->rememberToken();
			$t->timestamps();
		});

		// Create 'news' table
		Schema::create('news', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('user_id')->unsigned();
			$t->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
			$t->string('title', 100);
			$t->string('url', 150);
			$t->string('description', 250);
			$t->text('body');
			$t->string('image', 250)->nullable();
			$t->boolean('is_published')->default(false);
			$t->integer('views')->default(0);
			$t->integer('last_edit_by')->nullable();
			$t->string('last_edit_comment', 250)->nullable();
			$t->timestamps();
		});

		// Create 'video_types' table
		Schema::create('video_types', function($t) {	//['trailer', 'gameplay', 'interview', 'review', 'previews', 'other']
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('name', 20);
			$t->string('description', 250);
			$t->timestamps(); 
		});

		// Create 'videos' table
		Schema::create('videos', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('video_type');
			$t->integer('user_id')->unsigned();
			$t->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
			$t->string('url', 150);		
			$t->string('title', 100);
			$t->string('video', 250);
			$t->string('image', 250)->nullable();
			$t->string('description', 300);			
			$t->string('sources', 300)->nullable();
			$t->boolean('is_published')->default(false);
			$t->integer('views')->default(0);
			$t->integer('last_edit_by')->nullable();
			$t->string('last_edit_comment', 250)->nullable();
			$t->timestamps();
		});

		// Create 'reviews' table
		Schema::create('reviews', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('user_id')->unsigned();
			$t->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
			$t->string('url', 150);		
			$t->string('title', 100);
			$t->string('description', 300);
			$t->string('image', 250)->nullable();
			$t->text('body');
			$t->double('score')->nullable();
			$t->string('sources', 300)->nullable();
			$t->boolean('has_video')->default(false);
			$t->integer('video_id')->nullable();
			$t->string('video_image', 250)->nullable;
			$t->boolean('is_published')->default(false);
			$t->integer('views')->default(0);
			$t->integer('last_edit_by')->nullable();
			$t->string('last_edit_comment', 250)->nullable();
			$t->timestamps(); 
		});

		Schema::create('comments', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('parent_id')->nullable();
			$t->integer('user_id')->unsigned();
			$t->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
			$t->text('comment');
			$t->timestamps();
		});

		Schema::create('flag_types', function($t) {		//['spam', 'abusive', 'innapropriate', 'troll']
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('flag_type', 30);
			$t->string('flag_description');
			$t->timestamps();
		});

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

		Schema::create('settings', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('name', 50);
			$t->string('value', 100);
			$t->string('description', 250)->nullable();
			$t->timestamps();
		});

		Schema::create('companies', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('name');
			$t->string('description');
			$t->string('logo', 300)->nullable();
			$t->string('website', 300)->nullable();
			$t->timestamps();
		});

		Schema::create('games', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->string('name', 100);
			$t->string('box_art', 150)->nullable();
			$t->string('description', 500)->nullable();
			$t->integer('developer')->unsigned();
			$t->foreign('developer')->references('id')->on('companies')->onDelete('no action')->onUpdate('cascade');
			$t->integer('publisher')->unsigned();
			$t->foreign('publisher')->references('id')->on('companies')->onDelete('no action')->onUpdate('cascade');			
			$t->timestamps();
		});

		Schema::create('platforms', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id');
			$t->integer('developer')->unsigned();
			$t->foreign('developer')->references('id')->on('companies')->onDelete('no action')->onUpdate('cascade');
			$t->string('name', 60);
			$t->string('abreviation', 15)->nullable();
			$t->string('description', 250)->nullable();
			$t->timestamps();
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

		Schema::table('platforms', function($t) {
			$t->dropForeign('platforms_developer_foreign');
		});

		// Drop all above tables
		Schema::drop('groups');
		Schema::drop('users');	
		Schema::drop('news');
		Schema::drop('videos');
		Schema::drop('video_types');
		Schema::drop('reviews');
		Schema::drop('comments');
		Schema::drop('flag_types');
		Schema::drop('flagged_comments');
		Schema::drop('settings');
		Schema::drop('companies');
		Schema::drop('games');
		Schema::drop('platforms');
		
	}
}
