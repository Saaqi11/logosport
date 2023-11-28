<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class NewNotification implements ShouldBroadcastNow
{
    use InteractsWithSockets;

    public $message;
    public $id;

    public function __construct($message, $id)
    {
        $this->message = $message;
        $this->id = $id;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('Notification.'.$this->id);
    }

    public function broadcastWith()
    {
        return ["message" => $this->message, 'id' => $this->id];
    }
}