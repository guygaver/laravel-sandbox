<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	 protected $fillable = ['body'];

	 public function by(User $user) 
	 {
		  $this->user_id = $user->id;
	 }
	 
	 /**
	  * This function holds a relationship to the card that this note is owned by
	  * In laravel you define relationships using the model functions
	  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	  */
	 public function card()
	 {
		  return $this->belongsTo(Card::class);
    }

	 /**
	  * Like above we are defining a relationship between the note and another model, in this case the user.
	  * Just like above after implementation, you are able to reference the user by calling the user function on top of the notes object.
	  * This is very important when needing to eager load records
	  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	  */
	 public function user()
	 {
	 	 	return $this->belongsTo(User::class);
    }
}
