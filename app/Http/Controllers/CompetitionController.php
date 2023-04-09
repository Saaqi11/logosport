<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Work;
use App\Models\WorkMediaFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class CompetitionController extends Controller
{
    /**
     * @var string
     */
    private string $briefCompetitionView = "customer.contest.competition.";

    /**
     * @param $id
     * @return View | RedirectResponse
     */
    public function showBrief($id): View | RedirectResponse
    {
        $contest = Contest::with("customer", "style", "mediaFiles", "colors")->findOrFail($id);
        if ($contest) {
            return \view($this->briefCompetitionView."brief-intro", compact("contest"));
        }
        return redirect()->back()->with("error", "Contest not found");
    }

    /**
     * Round one
     * @param $id
     * @return View | RedirectResponse
     */
    public function roundOne($id): View | RedirectResponse
    {
        $contest = Contest::with("customer", "style", "mediaFiles", "colors")->findOrFail($id);
        if ($contest) {
            return \view($this->briefCompetitionView."round-one", compact("contest"));
        }
        return redirect()->back()->with("error", "Contest not found");
    }

    /**
     * Upload work
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function saveWork(Request $request, $id): RedirectResponse
    {
        $work = Work::where(["contest_id" => $id, "designer_user_id" => Auth::id()])->first();
        if (empty($work)) {
            $work = new Work();
            $work->designer_user_id = Auth::id();
            $work->contest_id = $id;
            $work->save();
        }
        if ($request->work) {
            $userAttachmentPublicPath = public_path("/work/".Auth::id()."/");
            //create dynamic directory
            if (!File::isDirectory($userAttachmentPublicPath)) {
                File::makeDirectory($userAttachmentPublicPath, 0755, true);
            }
            $userAttachmentPath = "/work/".Auth::id()."/".$request->work->getClientOriginalName();
            File::put($userAttachmentPublicPath.$request->work->getClientOriginalName(), $request->work);
            $workMediaFile = new WorkMediaFile();
            $workMediaFile->work_id = $work->id;
            $workMediaFile->src = $userAttachmentPath;
            $workMediaFile->save();
        }
        return redirect()->back()->with("success", "The work has been uploaded successfully");
    }
}
