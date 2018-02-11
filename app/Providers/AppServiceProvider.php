<?php

namespace App\Providers;

use App\GuestUser;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

	 /**
	  * Bootstrap any application services.
	  *
	  * @return void
	  */
	 public function boot()
	 {
		  auth()->logout();
//		  auth()->loginUsingId(1);
		  
		  // First method of sharing logged in state
//		  view()->share('signedIn', auth()->check());
//		  view()->share('user', auth()->user());
		  
		  // Second method would be to have a guest user class
		  view()->share('user', auth()->user() ?? new GuestUser());
		  
		  // Initialize blade directives like below
		  Blade::directive('hello', function($expression) {
				return "<?php echo 'hello ' . $expression ?>";
		  });

		  // You can also write them to translate objects from the input expression
		  Blade::directive('ago', function($expression) {
				return "<?= with{$expression}->updated_at->diffForHumans(); ?>";
		  });
	 }

	 /**
	  * Register any application services.
	  *
	  * @return void
	  */
	 public function register()
	 {
		  //
	 }
}
