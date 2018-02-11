<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
    	 
		  // configure the event that should fire and the listeners which should be executed post event
		  'App\Events\DonationMade' => [
            'App\Listeners\NotifyAdminsOfDonation',
        ],

		  'App\Events\UserRegistered' => [
				'App\Listeners\SendWelcomeEmail',
				'App\Listeners\AddUserToDefaultNewsletter',
		  ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
