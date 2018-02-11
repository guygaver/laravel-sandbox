<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	 /**
	  * This function holds a relationship to the card that this note is owned by
	  * In laravel you define relationships using the model functions
	  * @return \Illuminate\Database\Eloquent\Relations\HasMany
	  */
	 public function notes()
	 {
		  return $this->hasMany(Note::class);
    }

	 public function addNote(Note $note)
	 {
		  return $this->notes()->save($note);
    }
}
