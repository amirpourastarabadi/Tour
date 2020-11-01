<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PhoneVerification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $phone_number;


    public function __construct(String $phone_number)
    {
            $this->phone_number = $phone_number;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
