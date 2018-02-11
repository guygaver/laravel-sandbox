<?php

namespace App;

use App\Events\UserRegistered;
use App\Presenters\UserPresenter;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Completeable;

class User extends Authenticatable
{

	 use Notifiable;

	 /**
	  * The completeable trait is another place where we can put
	  * groups of functionality instead of a class like Stats below
	  */
	 use Completeable;

	 /**
	  * The attributes that are mass assignable.
	  *
	  * @var array
	  */
	 protected $fillable = [
		  'name',
		  'email',
		  'password',
		  'username',
		  'plan',
		  'team_id'
	 ];

	 /**
	  * The attributes that should be hidden for arrays.
	  *
	  * @var array
	  */
	 protected $hidden = [
		  'password',
		  'remember_token',
	 ];

	 /**
	  * Static register method to demonstrate Domain Events
	  *
	  * @param $attributes
	  * @return static
	  */
	 public static function register($attributes)
	 {
		  $user = static::create($attributes);

		  event(new UserRegistered($user));

		  return $user;
	 }

	 public function isAdmin()
	 {
		  return $this->type == 'admin';
	 }

	 public function isSubscribed()
	 {
	 	 return true;
		  return ($this->attributes['plan'] === $plan);
	 }

	 public function leaveTeam()
	 {
		  $this->team_id = null;
		  $this->save();

		  return $this;
	 }

	 /**
	  * before the refactor, the methods within the Stats class resided within this model.
	  * When you have pieces of similar functionality it is good to group then within a class like
	  * below and passing the model through the constructor
	  */
	 public function stats()
	 {
		  return new Stats($this);
	 }

	 public function startConversation(Conversation $conversation)
	 {

	 }

	 public function replyTo(Conversation $conversation, Reply $reply)
	 {

	 }

	 public function present()
	 {
		  return new UserPresenter($this);
	 }

	 public function isAMember()
	 {
		  return false;
	 }
}
