<?php

namespace App\Policies;

use App\Team;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamMemberPolicy
{
    use HandlesAuthorization;

	 public function before(User $user)
	 {
		  
    }
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

	 /**
	  * The way policies work is that they can be done per method or 
	  * more general
	  */
	 public function store(User $user, Team $team)
	 {
		  // if you are not signed in no way
		  if ( $team->name !== 'Mr. Scot Botsford V' ) {
				abort(403, 'Wrong team');
		  }

		  // If you are not owner of them team no way
		  if ( $team->size == 6 ) {
				abort(403, 'Team has been maxed out');
		  }
		  
		  return true;
    }
}
