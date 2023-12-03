<?php

namespace App\Http\Controllers;

use App\Events\SentMessage;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    /**
     * @var string
     */
    private string $chatView = "chat.";
    public function getChatRooms()
    {
        $userId = Auth::id();
        $conversations = Conversation::with('latestMessage')
            ->where('user1_id', $userId)
            ->orWhere('user2_id', $userId)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return \view($this->chatView . "index", compact("conversations"));

    }

    public function getMessages($conversationId)
    {
        $messages = Message::join('users', 'users.id', '=', 'messages.user_id')
            ->leftJoin('messages as parent_messages', 'parent_messages.id', '=', 'messages.parent_id')
            ->where('messages.conversation_id', $conversationId)
            ->select(
                'users.first_name',
                'users.last_name',
                'messages.user_id',
                'messages.id',
                'messages.parent_id',
                'messages.message',
                'messages.media',
                'messages.updated_at',
                'parent_messages.message as parent_message', // add this line to get parent message
                'parent_messages.updated_at as parent_updated_at' // if you need parent message time
            )
            ->orderBy('messages.id', 'desc')
            ->paginate(5);

        return response()->json([
            'success' => true,
            'data' => $messages,
            'message' => 'Messages fetched successfully.',
        ]);
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'conversationId' => 'required|exists:conversations,id',
            'messageText' => 'required_without:file',
            'file' => 'required_without:messageText|max:2048', // You can change this according to which files types you accept
        ]);

        $file = '';
        if ($request->hasFile('file')) {
            $userAttachmentPublicPath = public_path("/message/" . Auth::id() . "/");

            //create dynamic directory
            if (!File::isDirectory($userAttachmentPublicPath)) {
                File::makeDirectory($userAttachmentPublicPath, 0755, true);
            }
            $file = Storage::disk('chat_media')->put(Auth::id(), $request->file);
        }

        if ($request->parentId) {
            $parentMessage = Message::where('id', $request->parentId)->first();
        }

        $message = new Message;
        $message->conversation_id = $request->conversationId;
        $message->user_id = Auth::id();
        $message->message = $request->messageText;
        if ($file) {
            $message->media = "/message/" . $file;
        }

        if ($request->parentId) {
            $message->parent_id = $request->parentId;
        }

        $message->save();

        $message->parentMessage = $parentMessage->message ?? null;
        

        $conversation = Conversation::find($request->conversationId);
        if ($conversation->user1_id != Auth::id()) {
            $user = User::find($conversation->user1_id);
        } else {
            $user = User::find($conversation->user2_id);
        }

        broadcast(new SentMessage($message, $user, $request->conversationId));
        $message->conversation->touch();
        return response()->json(['status' => 'Message sent successfully.', 'data' => $message]);
    }
}
