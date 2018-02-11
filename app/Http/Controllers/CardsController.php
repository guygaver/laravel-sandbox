<?php

namespace App\Http\Controllers;

/**
 * Without importing the DB class would not be available because of the namespace constraints
 * - you can use the \ but it is more dirty and less readable
 */
use App\Services\ReferralService;
use DB;
use App\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
{
	public function index() {
		 $cards = Card::all();

		 return view('cards.index', ['cards' => $cards]);
	}

	 /**
	  * In laravel, route params are sent as params to the corresponding function
	  */
	public function show(Card $card) {

		 // Something very popular in Laravel is the ability to typehint what the route is expecting and laravel will automatically
		 // call the database based on the model (in this case Card) and retrieve what you need. As you can see the variable $card gets returned with no logical
		 // processing

		 // Since we have a relationship between a user and a note, to retreive the user object from a note relationship on top of a note, you can use eager loading.
		 // Here instead of needing to run multiple queries for each relationship, you are able to eager load the user by using dot notation on top of
		 // the object which you know has a relationship.
		 $card->load('notes.user');

		 return view('cards.show', ['card' => $card]);
	}

}
