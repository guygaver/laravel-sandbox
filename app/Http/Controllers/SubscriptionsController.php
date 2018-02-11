<?php

namespace App\Http\Controllers;

use App\Subscribers\RegistersForeverUser;
use App\Subscribers\RegistersTeamMember;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SubscriptionsController extends Controller
{

	 public function store(Request $request)
	 {


		  // Wrap your calls in the transaction closure and all failures will be rolled back
		  DB::transaction(function() {

				// create their account

				// bill them

				// create new user on website

		  });

		  /**
			* Below we are demonstrating a need for the strategy pattern
			* Here we have the need for a subscription service theres a number of different things
			*
			* 1. Identify a point of responsibility
			* 2. Extract each strategy into its own class
			* 3. Ensure that each of those strategies adheres to a common contract/interface
			* 4. Determine proper strategy
			*/

		  // Sign Up The User. But do they want a..
		  // 1. Forum Account
		  // 2. Regular Subscription
		  // 3. Team Member Access
		  // 4. Forever Access

		  $subscriberStrategy = $this->getRegistrationStrategy($request);

		  $subscriberStrategy->handle($request);
	 }

	 public function update(Request $request)
	 {
		  $code = $request->coupon;

		  // if the coupon code does not exist
		  $this->user->subscription()->usingCoupon($this->normalizeCoupon($code))->swap($plan);
	 }

	 private function getRegistrationStrategy(Request $request)
	 {
		  if ( $request->plan == 'forever' ) {
				return new RegistersForeverUser();
		  }

		  if ( $request->invitation ) {
				return new RegistersTeamMember();
		  }
	 }

	 /**
	  * Here we created a method which will handle normalizing the data from the coupon in the update method
	  *
	  * @param $code
	  * @param $plan
	  * @return bool
	  */
	 protected function normalizeCoupon($code, $plan)
	 {

		  // usually people will put this logic within a controller but you can normalize it
		  $coupon = Coupon::havingCode($code);

		  if ( ! $coupon ) {
				return false;
		  }

		  if ( ! $coupon->worksWithPlan($plan) ) {
				return false;
		  }

		  return $code;
	 }
}
