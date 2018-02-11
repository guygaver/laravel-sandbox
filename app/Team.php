<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

	 protected $fillable = [
		  'name',
		  'size'
	 ];

	 public function add($users)
	 {
		  $this->guardAgainstTooManyMembers($users);

		  if ( $users instanceof User ) {
				return $this->members()->save($users);
		  }

		  $this->members()->saveMany($users);
	 }

	 public function members()
	 {
		  return $this->hasMany(User::class);
	 }

	 public function count()
	 {
		  return $this->members()->count();
	 }

	 public function maximumSize()
	 {
		  return $this->size;
	 }

	 public function guardAgainstTooManyMembers($users)
	 {
	 	 $numbersToAdd = ($users instanceof User) ? 1 : $users->count();
	 	 $newTeamCount = $this->count() + $numbersToAdd;
	 	 
		  // guard
		  if ( $newTeamCount > $this->maximumSize() ) {
				throw new \Exception();
		  }
	 }

	 public function remove($users = null)
	 {
		  /**
			* There are many ways to create a hasMany relationship from a model
			*/
		  
		  // grab relationship and query with delete method
		  // $this->members()->where('user_id', $users->id)->delete();

		  // update field which signifies the relationship
//		  $users->update(['team_id' => null]);
		  
		  // add method to associated model to make update there and abstract even more
		  if ( $users instanceof User) {
				return $users->leaveTeam();
		  }
		  
		  $this->members()
				->whereIn('id', $users->pluck('id'))
				->update(['team_id' => null]);
	 }

}
