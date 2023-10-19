<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Work;
use App\Models\WorkMediaFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
            $works = Work::with("files", "reactions", "totalWorks")->where("contest_id", $id)->get();
            if(Auth::check()) {
                $totalWorks = Work::with("files")->where(["contest_id" => $id, "designer_user_id" => Auth::id()])->first();
            }
            return \view($this->briefCompetitionView."brief-intro", compact("works", "contest", "totalWorks"));
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
            $works = Work::with("files", "reactions", "totalWorks")->where("contest_id", $id)->get();
            $totalWorks = 0;
            if(Auth::check()) {
                $totalWorks = Work::with("files")->where(["contest_id" => $id, "designer_user_id" => Auth::id()])->first();
            }
            return \view($this->briefCompetitionView."round-one", compact("contest", "works", "totalWorks"));
        }
        return redirect()->back()->with("error", "Contest not found");
    }

    /**
     * Round one
     * @param $id
     * @return View | RedirectResponse
     */
    public function roundTwo($id): View | RedirectResponse
    {
        $contest = Contest::with("customer", "style", "mediaFiles", "colors")->findOrFail($id);
        if ($contest) {
            $works = Work::with("files", "reactions", "totalWorks")->where(["contest_id" => $id, "status" => 1])->get();
            if(Auth::check()) {
                $totalWorks = Work::with("files")->where(["contest_id" => $id, "designer_user_id" => Auth::id()])->first();
            }
            return \view($this->briefCompetitionView."round-two", compact("contest", "works", "totalWorks"));
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
        $work = Work::with("files")->where(["contest_id" => $id, "designer_user_id" => Auth::id()])->first();
        if (empty($work)) {
            $work = new Work();
            $work->designer_user_id = Auth::id();
            $work->contest_id = $id;
            $work->status = 0;
            $work->save();
        }
        if ($request->work) {
            if (count($work->files) < 4) {
                $userAttachmentPublicPath = public_path("/work/".Auth::id()."/");

                //create dynamic directory
                if (!File::isDirectory($userAttachmentPublicPath)) {
                    File::makeDirectory($userAttachmentPublicPath, 0755, true);
                }
                $file = Storage::disk('public_uploads')->put(Auth::id(), $request->work);
                $workMediaFile = new WorkMediaFile();
                $workMediaFile->work_id = $work->id;
                $workMediaFile->src = "work/".$file;
                $workMediaFile->save();
            } else {
                return redirect()->back()->with("error", "You have uploaded max (4) number of files. You can't add more");
            }
        }
        return redirect()->back()->with("success", "The work has been uploaded successfully");
    }

    /**
     * Update work status
     * @param $workId
     * @param $status
     * @return bool
     */
    public function changeWorkStatus($workId, $status): bool
    {
        $work = Work::where("id", $workId)->first();
        if (!empty($work)) {
            $work->status = $status;
            $work->update();
            $contestWorks = Work::where(["contest_id" => $work->contest_id, "status" => 1])->count();
            if ($contestWorks > 0) {
                Contest::where("id", $work->contest_id)->update([
                    "status" => 1
                ]);
            }
            return true;
        }
        return false;
    }

    /**
     * Declare position
     * @param $id
     * @param $position
     * @param $contestId
     * @return JsonResponse
     */
    public function declarePosition($id, $position, $contestId): JsonResponse
    {
        $checkPosition = Work::where(["contest_id" => $contestId, "place" => $position])->first();
        if (!empty($checkPosition->place)) {
            return response()->json(["message" => "This position has already been awarded", "status" => false]);
        }
        $work = Work::where("id", $id)->first();
        if (!empty($work)) {
            if (!empty($work->place)) {
                return response()->json(["message" => "This designer has already been rewarded with a position for this contest", "status" => false]);
            }
            $work->place = $position;
            $work->update();
            $works = Work::where("id", $id)
                ->whereIn("place", [1,2,3])
                ->get();
            if (count($works) === 3) {
                Contest::where("id", $contestId)->update([
                    "status" => 4
                ]);
            } else {
                Contest::where("id", $contestId)->update([
                    "status" => 2
                ]);
            }
            return response()->json(["message" => "The designer has been rewarded with ".$position." position", "status" => true]);
        }
        return response()->json(["message" => "This action is not allowed", "status" => false]);
    }

    /**
     * Get winners
     * @param $id
     * @return View | RedirectResponse
     */
    public function winners($id): View | RedirectResponse
    {
        $contest = Contest::with("customer")->findOrFail($id);
        if ($contest) {
            $works = Work::with("files", "reactions", "totalWorks")->where(["contest_id" => $id, "status" => 1])->whereIn("place", ["1", "2", "3"])->get();
            if(Auth::check()) {
                $totalWorks = Work::with("files")->where(["contest_id" => $id, "designer_user_id" => Auth::id()])->first();
            }
            return \view($this->briefCompetitionView."winners", compact("contest", "works", "totalWorks"));
        }
        return redirect()->back()->with("error", "Contest not found");
    }

    /**
     * Get Authenticated user work
     * @param $id
     * @return JsonResponse
     */
    public function getCurrentUserWorks($id): JsonResponse
    {
        $work = Work::with("files")->where(["contest_id" => $id, "designer_user_id" => \auth()->id()])->first();
        if (!empty($work)) {
            return response()->json(["work" => $work, "status" => true]);
        }
        return response()->json(["work" => [], "status" => false]);
    }

    /**
     * Get all works
     * @param $id
     * @return JsonResponse
     */
    public function getAllWorks($id): JsonResponse
    {
        $contest = Contest::with("customer", "style", "mediaFiles", "colors")->findOrFail($id);
        if ($contest) {
            $works = Work::with("files", "reactions", "totalWorks", "designer")->where("contest_id", $id)->get();
            return response()->json(["status" => true, "contest" => $contest, "works" => $works]);
        }
        return response()->json(["status" => false]);
    }

    /**
     * Get deleted works
     * @param $id
     * @return JsonResponse
     */
    public function getDeclinedWorks($id): JsonResponse
    {
        $contest = Contest::with("customer", "style", "mediaFiles", "colors")->findOrFail($id);
        if ($contest) {
            $works = Work::with("files", "reactions", "totalWorks", "designer")->where(["contest_id" => $id, "status" => 2])->get();
            return response()->json(["status" => true, "contest" => $contest, "works" => $works]);
        }
        return response()->json(["status" => false]);
    }

    /**
     * Sort works
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function sortWorks(Request $request, $id): JsonResponse
    {
        $contest = Contest::with("customer", "style", "mediaFiles", "colors")->findOrFail($id);
        if ($contest) {
            $query = Work::with("files", "reactions", "totalWorks", "designer");
            if ($request->get("workTypeFilter") === "declined-works") {
                $query = $query->where(["contest_id" => $id, "status" => 2]);
            } else {
                $query = $query->where("contest_id", $id);
            }
            $collection = $query->get();
            $works = new Collection($collection);
            $works = $works->sortBy("reactions", (int)$request->get("sortBy"));
            return response()->json(["status" => true, "contest" => $contest, "works" => $works]);
        }
        return response()->json(["status" => false]);
    }
}
