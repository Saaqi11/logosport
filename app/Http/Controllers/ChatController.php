<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * @var string
     */
    private string $chatView = "chat.";
    public function getChatRooms()
    {
        $userId = Auth::id();
        $conversations = Conversation::where('user1_id', $userId)
            ->orWhere('user2_id', $userId)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return \view($this->chatView . "index", compact("conversations"));

    }

    public function getMessages($conversationId)
    {
        $messages = Message::where('conversation_id', $conversationId)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return response()->json([
            'success' => true,
            'messages' => $messages,
            'message' => 'messages',
        ]);
    }
}
