<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotification implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $notification;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */

	 /**
	  * You can pass any data you need here
	  */
    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

	 /**
	  * You can type hint dependencies here
	  * Automatic resolution works here
	  */
    public function handle()
    {
        var_dump("Sending notification if is active" . $this->notification);
    }
}
