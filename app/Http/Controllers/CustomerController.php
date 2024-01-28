<?php

namespace App\Http\Controllers;

use App\Models\NotificationMessage;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function notifcation($id)
    {
        $notifications = NotificationMessage::where('user_id', $id)->orderBy('created_at', 'desc')->latest()->take(11)->get();

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

    /**
     * Round one
     * @param $id
     * @return View | RedirectResponse
     */
    public function getWorks(): View|RedirectResponse
    {
        $works = Work::with("files.favWork", "reactions", "totalWorks")
            ->whereIn('place', [1, 2, 3])
            ->orderBy('id', 'desc')
            ->paginate(8);
        return \view("customer.works.index", compact("works"));

    }

    /**
     * Round one
     * @param $id
     * @return View | RedirectResponse
     */
    public function getDesignerWorks(): View|RedirectResponse
    {
        $users = User::with([
            'works' => function ($query) {
                // Add your condition for the works
                $query->whereIn('place', [1,2,3]);
            },
            "getPositionWorks.reactions",
            "reactions"
        ])->whereHas(
                'roles',
                function ($q) {
                    $q->where('name', 'Designer');
                }
            )->orderBy("id", "Desc")->paginate(8);

        return \view("designer.works.index", compact("users"));

    }
}
