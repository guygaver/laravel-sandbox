<?php

namespace App\Events;

use App\User;
use Illuminate\Queue\SerializesModels;

class UserRegistered
{
    use SerializesModels;
    
	 /**
	  * @var User
	  */
	 public $user;

	 /**
	  * UserRegistered constructor.
	  *
	  * @param User $user
	  */
    public function __construct(User $user)
    {
        //
		  $this->user = $user;
	 }
}
