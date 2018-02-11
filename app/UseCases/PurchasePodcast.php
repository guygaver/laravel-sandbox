<?php

namespace App\UseCases;

class PurchasePodcast extends UseCase
{

	 /**
	  * This class was our original example for a use case.
	  * But if you look at the PurchasePodcast job then we can use the laravel
	  * jobs interface with all of its queueable functionality.
	  */
	 
	 
	 public function handle()
	 {
		  $this->preparePurchase()
				->sendEmail();
	 }

	 private function preparePurchase()
	 {
		  var_dump('preparing the purchase');

		  return $this;
	 }

	 private function sendEmail()
	 {
		  var_dump('Sending the email');

		  return $this;
	 }
}