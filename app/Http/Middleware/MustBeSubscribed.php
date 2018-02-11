<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MustBeSubscribed {
	 /**
	  * Handle an incoming request.
	  *
	  * @param  \Illuminate\Http\Request $request
	  * @param  \Closure $next
	  * @return mixed
	  */
	 public function handle($request, Closure $next, $plan) {
		  
		  if ( Auth::user()->isSubscribed($plan) ) {
				return $next($request);
		  }

		  dd('Not a yearly subscriber');

	 }
}
