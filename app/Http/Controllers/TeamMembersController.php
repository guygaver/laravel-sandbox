<?php

namespace App\Http\Controllers;

use App\Team;
use App\Policies\AddTeamMemberPolicy;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class TeamMembersController extends Controller
{

	 public function before(User $user)
	 {
		  if ( $user->isAdmin() ) {
				return true;
		  }
	 }

	 /**
	  * Some actions in your domain usually require you to run a few different checks before
	  * being able to do something. This where we can leverage policies.
	  */

	 public function store(Team $team)
	 {
		  // if you are not signed in no way
		  //		  if ( auth()->guest() ) {
		  //				abort(403, 'You are not signed in');
		  //		  }
		  //
		  //		  // If you are not owner of them team no way
		  //		  if ( $team->owner_id != auth()->user()->id ) {
		  //				abort(403, 'You are not the owner of the team');
		  //		  }
		  //
		  //		  if ( $team->isMaxedOut() ) {
		  //				abort(403, 'Your team is maxed out');
		  //		  }

		  // Using a custom policy class we can do this
		  (new AddTeamMemberPolicy($team))->allows();

		  // using laravel policies we can use this api
//		  $this->authorize('store', $team);
		  $this->authorize($team);

		  // If team is maxed out
		  return 'Add the user to the team';
	 }
}
