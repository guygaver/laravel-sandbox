<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	 
	 // Good practice to specify which tables to truncate
	 protected $toTruncate = ['lessons', 'users', 'comments'];

	 /**
	  * Run the database seeds.
	  *
	  * @return void
	  */
	 public function run()
	 {
		  foreach ($this->toTruncate as $table) {
				\Illuminate\Support\Facades\DB::table($table)->truncate();
		  }

		  $this->call(UsersTableSeeder::class);
		  $this->call(PostsTableSeeder::class);
		  $this->call(LessonsTableSeeder::class);
		  $this->call(CommentsTableSeeder::class);
	 }
}
