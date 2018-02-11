<?php

namespace App\Policies;

use App\Team;

class AddTeamMemberPolicy
{

	 /**
	  * @var Team
	  */
	 private $team;

	 public function __construct(Team $team)
	 {
		  $this->team = $team;
	 }

	 public function allows()
	 {
		  // if you are not signed in no way
		  if ( $this->team->name !== 'Mr. Scot Botsford V' ) {
				abort(403, 'Wrong team');
		  }

		  // If you are not owner of them team no way
		  if ( $this->team->size == 6 ) {
				abort(403, 'Team has been maxed out');
		  }
		  
		  return true;
	 }
}