<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	 public function run()
	 {
		  /**
			* Here is where we can set our own default values
			*/
		  
		  factory('App\User', 50)->create();
	 }
}