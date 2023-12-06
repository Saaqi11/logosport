<?php

namespace App\Http\Controllers;

use App\Events\SentMessage;
use App\Models\Contest;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Models\WorkParticipants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller {
    /**
     * @var string
     */
    private string $chatView = "chat.";
    public function getChatRooms() {
        $userId = Auth::id();
        $conversations = Conversation::with(['latestMessage', 'unReadMessagesCount'])
            ->where('payment_status', true)
            ->where(function ($query) use ($userId) {
                $query->where('user1_id', $userId)
                    ->orWhere('user2_id', $userId);
            })
            ->orderBy('updated_at', 'DESC')
            ->get();

        return \view($this->chatView."index", compact("conversations"));

    }

    public function getMessages($conversationId) {
        $conversation = Conversation::find($conversationId);

        $getMessages = Message::where('conversation_id', $conversationId)->get();

        foreach ($getMessages as $key => $message) {
            if ($message->user_id != Auth::id()) {
                $message->is_read = true;
                $message->save();
            }
        }

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
            

        foreach($messages as $key => $message) {
            $message->invite_message = $conversation->invite_message;
        }

        return response()->json([
            'success' => true,
            'data' => $messages,
            'message' => 'Messages fetched successfully.',
        ]);
    }

    public function sendMessage(Request $request) {
        $this->validate($request, [
            'conversationId' => 'required|exists:conversations,id',
            'messageText' => 'required_without:file',
            'file' => 'required_without:messageText|max:2048', // You can change this according to which files types you accept
        ]);

        $file = '';
        if($request->hasFile('file')) {
            $userAttachmentPublicPath = public_path("/message/".Auth::id()."/");

            //create dynamic directory
            if(!File::isDirectory($userAttachmentPublicPath)) {
                File::makeDirectory($userAttachmentPublicPath, 0755, true);
            }
            $file = Storage::disk('chat_media')->put(Auth::id(), $request->file);
        }

        if($request->parentId) {
            $parentMessage = Message::where('id', $request->parentId)->first();
        }

        $message = new Message;
        $message->conversation_id = $request->conversationId;
        $message->user_id = Auth::id();
        $message->message = $request->messageText;
        if($file) {
            $message->media = "/message/".$file;
        }

        if($request->parentId) {
            $message->parent_id = $request->parentId;
        }

        $message->save();

        $message->parentMessage = $parentMessage->message ?? null;


        $conversation = Conversation::find($request->conversationId);
        if($conversation->user1_id != Auth::id()) {
            $user = User::find($conversation->user1_id);
        } else {
            $user = User::find($conversation->user2_id);
        }

        broadcast(new SentMessage($message, $user, $request->conversationId));
        $message->conversation->touch();
        return response()->json(['status' => true, 'message' => 'Message sent successfully.', 'data' => $message]);
    }


    public function invitaion($contestId, $userId) {
        $findconversation = Conversation::where('contest_id', $contestId)->where('user2_id', $userId)->first();
        if(!$findconversation) {
            $conversation = new Conversation();
            $conversation->user1_id = Auth::id();
            $conversation->user2_id = $userId;
            $conversation->contest_id = $contestId;
            $conversation->invite_message = true;
            $conversation->save();

            $user = User::find($userId);
            $contest = Contest::find($contestId);

            $message = new Message;
            $message->conversation_id = $conversation->id;
            $message->user_id = Auth::id();
            $message->message = "<p> <br><br>Hi {$user->first_name} {$user->last_name},<br><br>
                    I hope this message finds you well. 
                    {$contest->company_name} is inviting you to participate in a contest with a reward of {$contest->contest_price}$.
                    If you are interested, please click on the accept icon.
                    <br><br>
                    Thank you.
                </p>";
            $message->save();

            return response()->json(['status' => true, 'message' => 'Designer added in the inviattion Link.']);
        }
        return response()->json(['status' => false, 'message' => 'already sent invitation.']);

    }

    public function acceptInvitaion($id) {
        $conversation = Conversation::find($id);

        $conversation->invite_message = 0;
        $conversation->save();

        $participant = new WorkParticipants();
        $participant->designer_user_id = Auth::id();
        $participant->contest_id = $conversation->contest_id;
        $participant->save();

        return response()->json(['status' => true, 'message' => 'Invitation accept successfully.']);

    }

    public function cancelInvitaion($id) {
        $conversation = Conversation::find($id);

        $conversation->invite_message = 0;
        $conversation->save();

        return response()->json(['status' => true, 'message' => 'Invitation cancel successfully.']);
    }

    public function checkConverstaion($contestId, $designerId, $userId) {
        $conversation = Conversation::where('contest_id', $contestId)->where('user2_id', $designerId)->first();

        if (!$conversation) {
            $newConversation = new Conversation();
            $newConversation->user1_id = $userId;
            $newConversation->user2_id = $designerId;
            $newConversation->contest_id = $contestId;
            $newConversation->payment_status = true;
            $newConversation->save();
        }

        return redirect('chat');
    }

    public function readMessage($conversationId) {

        $getMessages = Message::where('conversation_id', $conversationId)->get();

        foreach ($getMessages as $key => $message) {
            if ($message->user_id != Auth::id()) {
                $message->is_read = true;
                $message->save();
            }
        }
    }
}
