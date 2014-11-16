<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
    public function run()
    {	
    	Eloquent::unguard();

    	//$this->command->info('Groups table seeded!');
    	$this->call('GroupsTableSeeder');
		$this->call('UsersTableSeeder');
	    $this->call('CompaniesTableSeeder');
        $this->call('PlatformsTableSeeder');
        $this->call('GenresTableSeeder');
        $this->call('VideoCategoriesTableSeeder');
        $this->call('ArticleCategoriesTableSeeder');
        $this->call('EventsTableSeeder');
        $this->call('TagTypesTableSeeder');
        $this->call('SettingsTableSeeder');
        $this->call('GamesTableSeeder');
        $this->call('GameDevelopersTableSeeder');
        $this->call('GamePublishersTableSeeder');
        $this->call('GamePlatformsTableSeeder');
        $this->call('GameGenresTableSeeder');

        $tag = App::make('Tag');
        
        //create game tags        
        $games = DB::table('games')->get();
		foreach ($games as $game) {
		    $tag->createNewTag('games', $game->id);
		}

		//create platform tags
        $platforms = DB::table('platforms')->get();
		foreach ($platforms as $platform) {
		    $tag->createNewTag('platforms', $platform->id);
		}

		//create company tags
        $companies = DB::table('companies')->get();
		foreach ($companies as $company) {
		    $tag->createNewTag('companies', $company->id);
		}

		//create event tags
        $events = DB::table('events')->get();
		foreach ($events as $event) {
		    $tag->createNewTag('events', $event->id);
		}

   	}
}

class GroupsTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');
        //DB::table('groups')->delete();
    	//DB::table('groups')->truncate();

        // Create groups
		$groups = [
			[	
				'id' 			=> 	1,
	        	'group_name' 	=> 	'Unverified User',
	            'permissions' 	=> 	'none',
	            'description' 	=>	'An unverified user is one whose email is either unverified through a social provider (facebook, google, etc.) or whose email has not been provided. (For example, users who sign up with twitter are unverified because Twitter Oath facilities do not provide user emails.)',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[	
				'id' 			=> 	2,
	        	'group_name' 	=> 	'Verified User',
	            'permissions' 	=> 	'none',
	            'description' 	=>	'Verified users are those who have verified their email addresses by signing up to the site using their email, or those who have clciked a verification link after signing up thorugh a social network.',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[	
				'id' 			=> 	3,
				'group_name' 	=> 	'Junior Staff',
	            'permissions' 	=> 	'none',
	            'description' 	=> 	'this is the description',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[
				'id' 			=> 	4,
				'group_name' 	=> 	'Senior Staff',
	            'permissions' 	=> 	'none',
	            'description' 	=> 	'this is the description',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
	        [	
	        	'id' 			=> 	5,
				'group_name' 	=> 	'Administrator',
	            'permissions' 	=> 	'none',
	            'description' 	=> 	'this is the description',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ]
		];

		// Insert group date
		foreach($groups as $group){
			DB::table('groups')->insert($group);
		}
    }
}	

class UsersTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');
        //DB::table('users')->delete();

        $users = [
			[
	        	'group_id' 			=>	5,
	            'username' 			=> 	'nick',
	            'first_name'		=> 	'Nicholas',
	            'last_name'			=>	'Law',
	            'active'			=> 	1,
	            'email' 			=>	'nick_law@tpg.com.au',
	            'email_verified'	=>	1,
	            'password'			=> 	Hash::make('nl511988'),
	            'ip_address'		=> 	Request::getClientIp(),
	            'gender'			=>	'male',
	            'country'			=>	'Australia',
	            'created_at'		=> 	$now,            
	            'updated_at'		=> 	$now
	        ],
	        [
	        	'group_id' 			=>	5,
	            'username' 			=> 	'demo',
	            'first_name'		=> 	'Test',
	            'last_name'			=>	'Account',
	            'active'			=> 	1,
	            'email' 			=>	'admin@thelobbi.com',
	            'email_verified'	=>	1,
	            'password'			=> 	Hash::make('demo'),
	            'ip_address'		=> 	Request::getClientIp(),
	            'gender'			=>	'male',
	            'country'			=>	'United States',
	            'created_at'		=> 	$now,            
	            'updated_at'		=> 	$now
	        ]
	    ];

        DB::table('users')->insert($users);
    }

}

class CompaniesTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');

       // DB::table('companies')->delete();

        // Create groups
		$copmanies = [
			[ 	'name'	=> 	'The Astronauts', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[ 	'name'	=> 	'Nordic Games Publishing', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
	        [ 	'name' 	=> 	'Ubisoft', 'created_at'	=> 	$now, 'updated_at'	=> 	$now	],
			[	'name'	=> 	'Bungie', 'created_at'	=> 	$now, 'updated_at'	=> 	$now	],
	        [  	'name'	=> 	'Bohemia Interactive', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Electronic Arts', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
	        [ 	'name'	=> 	'EA Sports', 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],
	        [ 	'name' 	=> 	'Microsoft', 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],
	        [ 	'name' 	=> 	'Bandai Namco Games', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
	        [  	'name'	=> 	'Playground Games', 'created_at'	=> 	$now, 'updated_at'	=> 	$now   ],
	        [  	'name' 	=> 	'Monolith Productions', 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],	        
	        [  	'name'	=> 	'Behaviour Interactive', 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],
	        [  	'name' 	=> 	'Warner Bros. Interactive Entertainment', 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],
	        [  	'name' 	=> 	'Sony Computer Entertainment', 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],
	        [  	'name' 	=> 	'Apple Inc.', 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],
	        [  	'name' 	=> 	'Google Inc.', 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],
	        [  	'name' 	=> 	'Nintendo Co., Ltd.', 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ]
		];

		// Insert group date
		foreach($copmanies as $company){
			DB::table('companies')->insert($company);
		}         
    }
}

class PlatformsTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');
        //DB::table('platforms')->delete();

        // Create groups
		$platforms = [
			[	'name' 	=> 	'PC', 'abbreviation'  =>  'PC', 'abbreviation_slug' => 'pc', 'developer_id' => 8, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Mactintosh', 'abbreviation'  =>  'Mac', 'abbreviation_slug' => 'mac', 'developer_id' => 15, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'PlayStation 4', 'abbreviation'  =>  'PS4', 'abbreviation_slug' => 'ps4', 'developer_id' => 14, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'PlayStation 3', 'abbreviation'  =>  'PS3', 'abbreviation_slug' => 'ps3', 'developer_id' => 14, 'created_at'	=> 	$now, 'updated_at'	=> 	$now],
			[	'name' 	=> 	'PlayStation Vita', 'abbreviation'  =>  'PS Vita', 'abbreviation_slug' => 'ps-vita', 'developer_id' => 14, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Xbox One', 'abbreviation'  =>  'Xbox One', 'abbreviation_slug' => 'xbox-one', 'developer_id' => 8, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Xbox 360', 'abbreviation'  =>  'Xbox 360', 'abbreviation_slug' => 'xbox-360', 'developer_id' => 8, 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],
			[	'name' 	=> 	'Nintendo Wii U', 'abbreviation'  =>  'Wii U', 'abbreviation_slug' => 'wii-u', 'developer_id' => 17, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Nintendo 3DS', 'abbreviation'  =>  '3DS', 'abbreviation_slug' => '3ds', 'developer_id' => 17, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Android', 'abbreviation'  =>  'Android', 'abbreviation_slug' => 'android', 'developer_id' => 16, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'iOS', 'abbreviation'  =>  'iOS', 'abbreviation_slug' => 'ios', 'developer_id' => 15, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ]
		];

		// Insert group date
		foreach($platforms as $platform){
			DB::table('platforms')->insert($platform);
		}

    }
}


class GenresTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');
        //DB::table('platforms')->delete();

        // Create groups
		$genres = [
			[	'name' 	=> 	'Shooter', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'First-Person Shooter',  'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Role Playing Game', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Survinal Horror', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Adventure', 'created_at'	=> 	$now, 'updated_at'	=> 	$now],
			[	'name' 	=> 	'Massively Multiplayer Online', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Strategy', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Simulation', 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],
			[	'name' 	=> 	'Sports', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Action', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Platform', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ]			
		];

		// Insert group date
		foreach($genres as $genre){
			DB::table('genres')->insert($genre);
		}         
    }
}

class VideoCategoriesTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');
        //DB::table('platforms')->delete();

        // Create groups
		$categories = [
			[	'category' 	=> 	'Trailer', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'category' 	=> 	'Gameplay',  'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'category' 	=> 	'Review', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'category' 	=> 	'Preview', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'category' 	=> 	'Interview', 'created_at'	=> 	$now, 'updated_at'	=> 	$now],
			[	'category' 	=> 	'Other', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ]		
		];

		// Insert group date
		foreach($categories as $category){
			DB::table('video_categories')->insert($category);
		}         
    }
}

class ArticleCategoriesTableSeeder extends Seeder {

    public function run() {

    	$now = date('Y-m-d H:i:s');
        //DB::table('platforms')->delete();

        // Create groups
		$categories = [
			[	'category' 	=> 	'News', 'created_at'		=> 	$now, 'updated_at'	=> 	$now ],
			[	'category' 	=> 	'Review',  'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'category' 	=> 	'Interview', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'category' 	=> 	'Feature', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'category' 	=> 	'Opinion', 'created_at'	=> 	$now, 'updated_at'	=> 	$now],
			[	'category' 	=> 	'Other', 'created_at'	=> 	$now, 'updated_at'	=> 	$now]
		];

		// Insert group date
		foreach($categories as $category){
			DB::table('article_categories')->insert($category);
		}         
    }
}

class EventsTableSeeder extends Seeder {

    public function run() {

    	$pax_primeS = date_format(date_create("2014-09-07"),"Y-m-d");
    	$pax_primeE = date_format(date_create("2014-09-11"),"Y-m-d");
    	
    	$pax_eastS = date_format(date_create("2014-09-15"),"Y-m-d");
    	$pax_eastE = date_format(date_create("2014-09-16"),"Y-m-d");

    	$e3_2014S = date_format(date_create("2014-09-19"),"Y-m-d");
    	$e3_2014E = date_format(date_create("2014-09-20"),"Y-m-d");

		$gdcS = date_format(date_create("2014-09-02"),"Y-m-d");    	
		$gdcE = date_format(date_create("2014-09-04"),"Y-m-d");

		$gconS = date_format(date_create("2014-09-27"),"Y-m-d");
		$gconE = date_format(date_create("2014-09-27"),"Y-m-d");


    	$now = date('Y-m-d H:i:s');
        //DB::table('platforms')->delete();

        // Create groups
		$events = [
			[	'event' 	=> 	'PAX Prime 2014', 'event_slug' 	=> 	'pax-prime-2014', 'start_date' => $pax_primeS, 'end_date' => $pax_primeE, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'event' 	=> 	'PAX East 2014', 'event_slug' =>	'pax-east-2014', 'start_date' => $pax_eastS, 'end_date' => $pax_eastE, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'event' 	=> 	'E3 2014', 'event_slug' => 	'e3-2014', 'start_date' => $e3_2014S, 'end_date' => $e3_2014E, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'event' 	=> 	'GDC 2015', 'event_slug' => 	'gdc-2015', 'start_date' => $gdcS, 'end_date' => $gdcE, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'event' 	=> 	'GamesCon 2014', 'event_slug' => 	'gamescon-2014', 'start_date' => $gconS, 'end_date' => $gconE, 'created_at'	=> 	$now, 'updated_at'	=> 	$now]
		];

		// Insert group date
		foreach($events as $event){
			DB::table('events')->insert($event);
		}         
    }
}

class TagTypesTableSeeder extends Seeder {

    public function run() {
    	
    	$now = date('Y-m-d H:i:s');

        // Create groups
		$tag_types = [
			[	'id' 	=> 	1, 'type' => 'games' ],
			[	'id' 	=> 	2, 'type' => 'platforms' ],
			[	'id' 	=> 	3, 'type' => 'companies' ],
			[	'id' 	=> 	4, 'type' => 'events' ]
		];

		// Insert group date
		foreach($tag_types as $tag_type){
			DB::table('tag_types')->insert($tag_type);
		}         
    }
}

class SettingsTableSeeder extends Seeder {

    public function run() {
    	
    	$now = date('Y-m-d H:i:s');

        // Create groups
		$settings = [
			[	'name' 	=> 	'autoplay_videos', 'value' => 'true', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ]
		];

		// Insert group date
		foreach($settings as $setting){
			DB::table('settings')->insert($setting);
		}         
    }
}

class GamesTableSeeder extends Seeder {

    public function run() {

    	$jsonData 	= file_get_contents(app_path() . '/database/seeds/TestData/games.json');
		$arrayData	= json_decode($jsonData, true);
		
		// Insert game date
		foreach($arrayData as $array){
			DB::table('games')->insert($array);
		}
    }
}

class GameDevelopersTableSeeder extends Seeder {

    public function run() {

    	$jsonData 	= file_get_contents(app_path() . '/database/seeds/TestData/game_developers.json');
		$arrayData	= json_decode($jsonData, true);
		
		// Insert game date
		foreach($arrayData as $array){
			DB::table('game_developers')->insert($array);
		}
    }
}

class GamePublishersTableSeeder extends Seeder {

    public function run() {

    	$jsonData 	= file_get_contents(app_path() . '/database/seeds/TestData/game_publishers.json');
		$arrayData	= json_decode($jsonData, true);
		
		// Insert game date
		foreach($arrayData as $array){
			DB::table('game_publishers')->insert($array);
		}
    }
}

class GamePlatformsTableSeeder extends Seeder {

    public function run() {

    	$jsonData 	= file_get_contents(app_path() . '/database/seeds/TestData/game_platforms.json');
		$arrayData	= json_decode($jsonData, true);
		
		// Insert game date
		foreach($arrayData as $array){
			DB::table('game_platforms')->insert($array);
		}
    }
}

class GameGenresTableSeeder extends Seeder {

    public function run() {

    	$jsonData 	= file_get_contents(app_path() . '/database/seeds/TestData/game_genres.json');
		$arrayData	= json_decode($jsonData, true);
		
		// Insert game date
		foreach($arrayData as $array){
			DB::table('game_genres')->insert($array);
		}
    }
}
