<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\User;
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
    public function myAllWorks(): View
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
    public function myActiveWorks(): View
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
    public function myWinnerWorks(): View
    {
        $works = WorkParticipants::where("designer_user_id", Auth::id())
            ->with("contest.winnerWork.files")
            ->paginate(10);
        return view("user.cabinet.winners-works", compact("works"));
    }

    public function designerWork($id, $position): View
    {
        $works = WorkParticipants::where("designer_user_id", $id)
            ->paginate(10);

        $totalRecord = WorkParticipants::where("designer_user_id", $id)
            ->get();

        $user = User::find($id);
        
        $totalWork = 0;
        $totalFavorite = 0;
        $totalWinnner = 0;
        $totalFirstPosition = 0;
        $totalSecondPosition = 0;
        $totalThirdPosition = 0;
        $totalParticipants = $totalRecord->count();

        foreach ($totalRecord as $work) {
            foreach ($work->contest->works as $work) {
                $files = $work->files;
                $totalWork += $files->count();
            }
            $totalFirstPosition += $work->contest->firstPosition->count();
            $totalSecondPosition += $work->contest->secondPosition->count();
            $totalThirdPosition += $work->contest->thirdPosition->count();

            $favoriteWorks = $work->contest->favorite;
            $totalFavorite += $favoriteWorks->count();
        }
        $totalWinnner = $totalFirstPosition + $totalSecondPosition + $totalThirdPosition;
        return view("user.profile.work-list", compact("user", "works", "position", "id", "totalWork", "totalFavorite", "totalFirstPosition", "totalSecondPosition", "totalThirdPosition", "totalWinnner", "totalParticipants"));
    }
}
