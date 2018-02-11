<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
	 /**
	  * the store method will demonstrate how you can use an event to group
	  * different types of logic in one flow rather than all in the controller
	  */

	 /**
	  * Its good practices to add custom annotation to doc when there are things happening in the background
	  * so when you come back to the method later you will know whats going on
	  * 
	  * @event UserRegistered
	  */
	 public function store()
	 {
		  User::register([
				'username' => 'Jefdsasfrey',
				'email' => 'guyadsasg@wkjh.com',
				'password' => bcrypt('pass')
		  ]);

		  // send them a welcome email

		  // monitor campaign for newsletter

		  // Schedule a follow up email

		  // update stats 
	 }
}
