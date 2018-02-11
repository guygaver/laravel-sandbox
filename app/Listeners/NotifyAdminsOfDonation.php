<?php

namespace App\Listeners;

use App\Events\DonationMade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminsOfDonation implements ShouldQueue
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
        var_dump("Email admin of donation from ");
    }
}
