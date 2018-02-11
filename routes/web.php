<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Events\DonationMade;
use App\User;

/**
 * You can specify which functions will be called in the controller based on the syntax below
 */

// Here we are passing a closure rather than controller action name. We can also type hint a service and laravel will automatically
// resolve it to a service in the container
//Route::get('/', function(ServiceTest $st) {
//	 //	 var_dump($st);
//
//	 var_dump(app('myServ'));
//
//	 $hajba = "HAJBA";
//
//	 // calling an event can be done like such
//	 event(new DonationMade($hajba));
//	 // or passing string and payload. Also there is a third parameter which is halt
//	 event('DonationMade', [], true);
//
//	 //	 return view('welcome');
//}); // you would chain the middleware function onto this statement to have it go through middleware


// Below you can find some dumps of how contracts are working.
Route::get('/contracts', function() {

	 // Using static class
	 var_dump(Config::get('database.default'));

	 // Using interface
	 var_dump(app('Illuminate\Contracts\Config\Repository'));
	 
	 // whether we use the interface or concrete class like below it will be the same result. 
	 // both adhere to the contract
	 var_dump(app('Illuminate\Config\Repository'));

	 // using app and passing key identifier
	 var_dump(app('config')['database']['default']);

});

Route::get('test', 'WelcomeController@home');


// There are many different ways to retreive items from the container
Route::get('hash', function() {
	echo Hash::make('password') . '<br>';
	
	echo 	app('hash')->make('password') . '<br>';
	
	echo app('Illuminate\Contracts\Hashing\Hasher')->make('password');
});



// MIDDLEWARE EXAMPLE
Route::get('/auth-middleware', ['middleware' => ['admin'], function() {
	 
}]);

Route::get('/login-example', function() {
	$user = \App\User::create([
		 'username' => 'GuyGg',
		 'email' => 'john@gay.com',
		 'password' => bcrypt('password'),
		 'plan' => 'yearly'
	]);
	
	Auth::login($user);
	
	return redirect('/');
});

/**
 * Middleware variables
 */

Route::get('subscribed', ['middleware' => 'subscribed:yearly', function() {
	 return 'You can only see this page if you are subscribed and have yearly membership';
}]);

/**
 * PHPUNIT ROUTE TESTS
 */

Route::get('/phpunit', function(){
	return 'Laravel 5'; 
});

Route::get('/phpunit-click', function(){
	 return view('welcome');
});

Route::get('/phpunit-redirect', function(){
	 return "You've been clicked punk";
});

Route::get('/phpunit-redirec', function(){
	 return "You've been clicked punk";
});

/**
 * Practicing Jobs
 */

Route::get('reports', 'ReportsController@index');

/**
 * Testing custom blade directives
 * - find in AppServiceProvider for directive
 */

Route::get('blade', function() {
	return view('custom-blade')->with('user', App\User::first()); 
});

/**
 * Testing filtering by multiple query string
 */

Route::get('lessons', ['uses' => 'LessonsController@get']);





Route::get('begin', function() {
	 session()->flash('status', 'Here is my status.');

	 redirect("/");
});

Route::get('/testing-di', function() {
	 app()->make('ReferralService')->doSomething();
	 echo "Here";
});

Route::get('/tasks', function() {
	 $tasks = App\Task::latest()->get();

	 return view('tasks', ['tasks' => $tasks]);
});

Route::get('/alert', function() {
	 return view('alert');
});

Route::get('/vue', function() {
	 return view('vue');
});

Route::get('api/tasks', function() {
	 return App\Task::latest()->get();
});

Route::get('/begin', function() {
	 Session::flash('status', 'Hello There');

	 return back();
});

Route::get('/about', 'PagesController@about');

Route::get('/cards', 'CardsController@index');

/**
 * Belows definition is for a route which is expecting a parameter
 * - route params are specified using braces
 */
Route::get('/cards/{card?}', 'CardsController@show');

Route::post('cards/{card}/notes', 'NotesController@store');

Route::get('/notes/{note}/edit', 'NotesController@edit');

Route::patch('notes/{note}', 'NotesController@update');

//class MyTest {
//	 public function __construct() {
//		  echo "Constructed";
//	 }
//
//	 public function say() {
//		  echo "Saying";
//	 }
//}

Auth::routes();

Route::get('/home', 'HomeController@index');


/**
 * Route for a Vue form
 */

Route::get('/projects', 'ProjectsController@create');
Route::post('/projects', 'ProjectsController@store');


/**
 * Routes for whipping monstrous code into shape
 */

// Using Use Cases
Route::get('purchases', 'PurchaseController@store');

// Using Domain Events
Route::get('users', 'UsersController@store');

// Using policies
//Auth::login(User::find(1));
Route::get('add-team-member/{team}', 'TeamMembersController@store');

// Using View Models
Route::get('view-models', 'WelcomeController@viewModel');

// Sticking to seven resourceful methods

// Flights controller
	// GET /flights


// Testing Guest User Class
Route::get('/guest-user', function() {
	 return view('guest-user');
});