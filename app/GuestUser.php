<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestUser extends User
{

	 public function isAMember()
	 {
		  return true;
    }
}
