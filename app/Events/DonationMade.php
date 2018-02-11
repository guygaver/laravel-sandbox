<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

// just add the ShouldBroadcast to be able to broadcast on the front end for websockets
class DonationMade implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
	 
	 public $hajba;
	 
	 /**
	  * Create a new event instance.
	  *
	  * @return void
	  */
	 
	 // you can pass whatever data you need to be passed to the post event listeners
	 public function __construct($hajba)
	 {
		  $this->hajba = $hajba;
	 }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
