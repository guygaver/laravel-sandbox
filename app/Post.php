<?php

namespace App;

use App\Traits\Likeability;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{

	 use Likeability;
	 
	 public function comments()
	 {
		  return $this->hasMany(Comment::class);
	 }
}
