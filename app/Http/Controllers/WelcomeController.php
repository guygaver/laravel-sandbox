<?php

namespace App\Http\Controllers;

use App\User;

class WelcomeController extends Controller {

//	 public function __construct(Repository $config) {
//		  $this->config = $config;
//	 }

	 public function home(Repository $methodInjection) {
	 	 
		  // constructor
		  echo $this->config->get('database.default'); 

		  // method injection
		  echo $methodInjection->get('database.default');

		  // facade accessor
		  echo \Config::get('database.default');
		  
		  // config helper (recommended by Jeffrey Way) when this is available, why add more complexity
		  // by specifying many different classes that are standard about Laravel
		  echo config('database.default');
	 }

	 public function viewModel() {
		  
		  return view('welcome', ['user' => User::all()->first()]);
	 }
}
