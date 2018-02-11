<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;

class PurchasePodcast implements ShouldQueue
{

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
