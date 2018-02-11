<?php

namespace App\Http\Controllers;

use App\Note;
use App\Card;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function store(Request $request, Card $card)
	 {
	 	 	// using this controller method, you can set the validation fields
		  	// it is possible to pipe other filters onto the same field like shown below. The body is required and must be atleast 10 characters
	 	 	$this->validate($request, [
	 	 		 'body' => 'required|min:10'
			]);

	 	 	$note = new Note();
		  	$note->user_id = 1;
		   $note->body = $request->body;

		  	// here is another approach to saving
//		  	$note = new Note(['body' => $request->body]);

		  	$card->notes()->save($note);

		  	// This approach is passing a new note with constructor
//		  	$card->notes()->save(
//		  		 new Note(['body' => $request->body])
//			);

		  	// This returns key value array. We are specifying the mass update field of body so no other data will be sent through.
//		  	$card->notes()->save($request->all());

		  	// There are many ways to redirect. Here we have the back function which sends to the last url.
		  	// You can also use the Request objects methods
		  	return back();
	 }


	 public function edit(Note $note)
	 {
	 	 	return view('notes.edit', compact('note'));
	 }

	 public function update(Request $request, Note $note)
	 {
	 	 	$note->update($request->all());

		  	return back();
	 }
}
