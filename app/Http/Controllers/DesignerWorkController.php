<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\WorkParticipants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DesignerWorkController extends Controller
{
    /**
     * My all works
     * @return View
     */
    public function myAllWorks (): View
    {
        $works = WorkParticipants::where("designer_user_id", Auth::id())
            ->with("contest.designerWork.files")
            ->paginate(10);
        return view("user.cabinet.all-works", compact("works"));
    }

    /**
     * My active works
     * @return View
     */
    public function myActiveWorks (): View
    {
        $works = WorkParticipants::where("designer_user_id", Auth::id())
            ->with("activeContest.designerWork.files")
            ->paginate(10);
        return view("user.cabinet.active-works", compact("works"));
    }

    /**
     * My winner works
     * @return View
     */
    public function myWinnerWorks (): View
    {
        $works = WorkParticipants::where("designer_user_id", Auth::id())
            ->with("contest.winnerWork.files")
            ->paginate(10);
        return view("user.cabinet.winners-works", compact("works"));
    }
}
