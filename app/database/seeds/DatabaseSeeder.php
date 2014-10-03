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
        $this->call('GamesTableSeeder');
        $this->call('GameDevelopersTableSeeder');
        $this->call('GamePublishersTableSeeder');
        $this->call('GamePlatformsTableSeeder');
        $this->call('GameGenresTableSeeder');
        
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
	        	'group_name' 	=> 	'registered_user',
	            'permissions' 	=> 	'none',
	            'description' 	=>	'this is the description',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[
				'group_name' 	=> 	'moderator',
	            'permissions' 	=> 	'none',
	            'description' 	=> 	'this is the description',
	            'created_at'	=> 	$now,            
	            'updated_at'	=> 	$now
	        ],
			[
				'group_name' 	=> 	'admin',
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
	        	'group_id' 			=>	3,
	            'username' 			=> 	'nick',
	            'active'			=> 	1,
	            'email' 			=>	'nick_law@tpg.com.au',
	            'email_verified'	=>	1,
	            'password'			=> 	Hash::make('nl511988'),
	            'ip_address'		=> 	Request::getClientIp(),
	            'gender'			=>	'male',
	            'country'			=>	'Australia',
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
			[	'name' 	=> 	'Electronic Arts', 'abbreviation'  =>  'EA', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
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
			[	'name' 	=> 	'PC', 'abbreviation'  =>  'PC', 'developer_id' => 8, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Mactintosh', 'abbreviation'  =>  'Mac', 'developer_id' => 15, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'PlayStation 4', 'abbreviation'  =>  'PS4', 'developer_id' => 14, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'PlayStation 3', 'abbreviation'  =>  'PS3', 'developer_id' => 14, 'created_at'	=> 	$now, 'updated_at'	=> 	$now],
			[	'name' 	=> 	'PlayStation Portable', 'abbreviation'  =>  'PSP', 'developer_id' => 14, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Xbox One', 'abbreviation'  =>  'Xbox One', 'developer_id' => 8, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Xbox 360', 'abbreviation'  =>  'Xbox 360', 'developer_id' => 8, 'created_at'	=> 	$now, 'updated_at'	=> 	$now  ],
			[	'name' 	=> 	'Nintendo Wii U', 'abbreviation'  =>  'Wii U', 'developer_id' => 17, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Nintendo 3DS', 'abbreviation'  =>  '3DS', 'developer_id' => 17, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Android', 'abbreviation'  =>  'Android', 'developer_id' => 16, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'iOS', 'abbreviation'  =>  'iOS', 'developer_id' => 15, 'created_at'	=> 	$now, 'updated_at'	=> 	$now ]
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
			[	'name' 	=> 	'First-Person Shooter', 'abbreviation'  =>  'FPS', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Role Playing Game', 'abbreviation'  =>  'RPG', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Survinal Horror', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
			[	'name' 	=> 	'Adventure', 'created_at'	=> 	$now, 'updated_at'	=> 	$now],
			[	'name' 	=> 	'Massively Multiplayer Online', 'abbreviation'  =>  'MMO', 'created_at'	=> 	$now, 'updated_at'	=> 	$now ],
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
