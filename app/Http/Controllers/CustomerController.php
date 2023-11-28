<?php

namespace App\Http\Controllers;

use App\Models\NotificationMessage;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function notifcation($id)
    {
        $notifications = NotificationMessage::where('user_id' , $id)->get();

        return response()->json(['notifications' => $notifications]);
    }
}
