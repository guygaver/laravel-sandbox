<?php

namespace App\Http\Controllers;

use App\Mail\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

	 /**
	  * Handles the sending of a support ticket email
	  */
	 public function postContact()
	 {
		  $this->validate(request(), [
				'name'     => 'required',
				'email'    => 'required|email',
				'question' => 'required',
		  ]);

		  Mail::to('guygaver@gmail.com')
				->send(new SupportTicket());
	 }
}
