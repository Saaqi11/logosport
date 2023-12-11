<?php

namespace App\Http\Controllers;

use App\Models\NotificationMessage;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function notifcation($id)
    {
        $notifications = NotificationMessage::where('user_id' , $id)->orderBy('created_at', 'desc')->get();

        return response()->json(['notifications' => $notifications]);
    }

    public function allNotification($id)
    {
        $notifications = NotificationMessage::where('user_id', $id)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        if (request()->expectsJson()) {
            return response()->json([
                'html' => view('notifications.partial', compact('notifications'))->render(),
                'nextPageUrl' => $notifications->nextPageUrl(),
            ]);
        }

        return view('notification', compact('notifications'));
    }
}
