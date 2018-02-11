<?php

Use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{

	 public function run()
	 {
		  factory('App\Lesson', 30)->create([
		  	 'videos' => 15,
		  ]);
	 }
}