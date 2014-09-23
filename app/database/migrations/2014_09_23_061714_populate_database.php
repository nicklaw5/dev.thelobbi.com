<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Populate 'groups' table
		include(app_path().'/includes/table-data.php');

		foreach($groups as $group){
			DB::table('groups')->insert($group);
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Truncate table data
		//DB::table('groups')->truncate();
	}

}
