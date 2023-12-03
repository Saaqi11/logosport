<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class SentMessage implements ShouldBroadcastNow
{
    use InteractsWithSockets;

    public $message;
    public $user;
    public $conversationId;

    public function __construct($message, $user, $conversationId)
    {
        $this->message = $message;
        $this->user = $user;
        $this->conversationId = $conversationId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat.'.$this->user->id);
    }

    public function broadcastWith()
    {
        return ["message" => $this->message, 'user' => $this->user, 'conversation_id' => $this->conversationId];
    }
}