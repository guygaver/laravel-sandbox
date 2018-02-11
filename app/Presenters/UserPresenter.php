<?php

namespace App\Presenters;

class UserPresenter extends Presenter
{

	 public function lowerFullName()
	 {
		  return strtolower($this->user->name);
	 }
}