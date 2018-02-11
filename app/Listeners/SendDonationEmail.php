<?php

namespace App\Listeners;

use App\Events\DonationMade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDonationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DonationMade  $event
     * @return void
     */
    public function handle(DonationMade $event)
    {
        //
    }
}
