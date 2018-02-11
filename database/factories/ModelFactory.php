<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
//        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->userName,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {

	 return [
		  'body' => $faker->paragraph()
	 ];
});

$factory->define(App\Lesson::class, function (Faker\Generator $faker) {

	 return [
		  'name' => $faker->name,
		  'body' => $faker->text(100),
		  'likes' => $faker->numberBetween(1, 20000),
		  'views' => $faker->numberBetween(1, 20000),
		  'difficulty' => $faker->randomElement(['beginner', 'intermediate', 'advanced'])
	 ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {

	 return [
		  'title' => $faker->sentence,
	 ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {

	 return [
		  'name' => $faker->name,
		  'size' => 5
	 ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {

	 return [
		  'name' => $faker->name,
		  'size' => 5
	 ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {

	 return [
		  'post_id' => \App\Post::inRandomOrder()->first()->id,
		  'body' => $faker->text
	 ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
	 
	 return [
		  'user_id' => \App\User::inRandomOrder()->first()->id,
		  'body' => $faker->text,
		  'title' => $faker->title,
	 ];
});
