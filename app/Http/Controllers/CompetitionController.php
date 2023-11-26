<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\CustomerFavouriteWork;
use App\Models\UserWorkReaction;
use App\Models\WinnerMediaFile;
use App\Models\Work;
use App\Models\WorkMediaFile;
use App\Models\WorkReaction;
use Carbon\Carbon;
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
    public function showBrief($id): View|RedirectResponse
    {
        $contest = Contest::with("customer", "style", "mediaFiles", "colors")->findOrFail($id);
        if ($contest) {
            $works = Work::with("files", "reactions", "totalWorks")->where("contest_id", $id)->get();
            $totalWorks = 0;
            if (Auth::check()) {
                $totalWorks = Work::with("files")->where(["contest_id" => $id, "designer_user_id" => Auth::id()])->first();
            }
            return \view($this->briefCompetitionView . "brief-intro", compact("works", "contest", "totalWorks"));
        }
        return redirect()->back()->with("error", "Contest not found");
    }

    /**
     * Round one
     * @param $id
     * @return View | RedirectResponse
     */
    public function roundOne($id): View|RedirectResponse
    {
        $contest = Contest::with("customer", "style", "mediaFiles", "colors")->findOrFail($id);
        if ($contest) {
            $works = Work::with("files", "reactions", "totalWorks")->where("contest_id", $id)->get();
            $totalWorks = 0;
            if (Auth::check()) {
                $totalWorks = Work::with("files")->where(["contest_id" => $id, "designer_user_id" => Auth::id()])->first();
            }
            return \view($this->briefCompetitionView . "round-one", compact("contest", "works", "totalWorks"));
        }
        return redirect()->back()->with("error", "Contest not found");
    }

    /**
     * Round one
     * @param $id
     * @return View | RedirectResponse
     */
    public function roundTwo($id): View|RedirectResponse
    {
        $contest = Contest::with("customer", "style", "mediaFiles", "colors")->findOrFail($id);
        if ($contest) {
            $works = Work::with("files.favWork", "reactions", "totalWorks")->where(["contest_id" => $id])->get();
            $totalWorks = 0;
            if (Auth::check()) {
                $totalWorks = Work::with("files")->where(["contest_id" => $id, "designer_user_id" => Auth::id()])->first();
            }
            return \view($this->briefCompetitionView . "designer-works", compact("contest", "works", "totalWorks"));
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
                $userAttachmentPublicPath = public_path("/work/" . Auth::id() . "/");

                //create dynamic directory
                if (!File::isDirectory($userAttachmentPublicPath)) {
                    File::makeDirectory($userAttachmentPublicPath, 0755, true);
                }
                $file = Storage::disk('public_uploads')->put(Auth::id(), $request->work);
                $workMediaFile = new WorkMediaFile();
                $workMediaFile->work_id = $work->id;
                $workMediaFile->src = "work/" . $file;
                $workMediaFile->save();
            } else {
                return redirect()->back()->with("error", "You have uploaded max (4) number of files. You can't add more");
            }
        }
        return redirect()->back()->with("success", "The work has been uploaded successfully");
    }

    public function updateWork(Request $request, $id)
    {
        $workMediaFile = WorkMediaFile::find($id);

        if ($workMediaFile) {
            $filePath = public_path($workMediaFile->src);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            $userAttachmentPublicPath = public_path("/work/" . Auth::id() . "/");

            //create dynamic directory
            if (!File::isDirectory($userAttachmentPublicPath)) {
                File::makeDirectory($userAttachmentPublicPath, 0755, true);
            }
            $file = Storage::disk('public_uploads')->put(Auth::id(), $request->work);
            $workMediaFile->src = "work/" . $file;
            $workMediaFile->update();
            return response()->json([
                'success' => true,
                'fileId' => $id,
                'updatedImageUrl' => asset($workMediaFile->src),
                'message' => 'The work has been updated successfully',
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'file not found',
        ]);


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
            if ($position == 1) {
                $work->expires_at = Carbon::now()->addDays(3);
            }
            $work->update();
            $works = Work::where("id", $id)
                ->whereIn("place", [1, 2, 3])
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
            return response()->json(["message" => "The designer has been rewarded with " . $position . " position", "status" => true]);
        }
        return response()->json(["message" => "This action is not allowed", "status" => false]);
    }

    /**
     * Get winners
     * @param $id
     * @return View | RedirectResponse
     */
    public function winners($id): View|RedirectResponse
    {
        $contest = Contest::with("customer")->findOrFail($id);
        if ($contest) {
            $works = Work::with("files.favWork", "reactions", "totalWorks")->where(["contest_id" => $id])->whereIn("place", ["1", "2", "3"])->orderBy("place", "asc")->get();
            $totalWorks = 0;
            if (Auth::check()) {
                $totalWorks = Work::with("files")->where(["contest_id" => $id, "designer_user_id" => Auth::id()])->first();
            }

            foreach ($works as $work) {
                $workReaction = WorkReaction::where('work_id', $work->id)->where('designer_user_id', $work->designer->id)->first();
                if (!$workReaction) {
                    $work->is_reaction = false;
                } else {
                    $userReaction = UserWorkReaction::where('reaction_id', $workReaction->id)->where('user_id', Auth::id())->first();
                    if (!$userReaction) {
                        $work->is_reaction = false;
                    } else {
                        $work->is_reaction = true;
                    }

                    $work->reaction_count = $workReaction->count ?? 0;
                }
            }
            return \view($this->briefCompetitionView . "winners", compact("contest", "works", "totalWorks"));
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
            $works = $works->sortBy("reactions", (int) $request->get("sortBy"));
            return response()->json(["status" => true, "contest" => $contest, "works" => $works]);
        }
        return response()->json(["status" => false]);
    }

    /**
     * Get winner works
     * @param $id
     * @return JsonResponse
     */
    public function getWinnerWorks($id): JsonResponse
    {
        $work = Work::with("files", "reactions", "totalWorks", "designer", "contest.customer")->where("id", $id)->first();
        if (!empty($work)) {
            return response()->json($work);
        }
        return response()->json(null);
    }

    /**
     * save Customer's fav work
     * @param $id
     * @param $status
     * @return bool
     */
    public function saveCustomerFavouriteWork($id, $status): bool
    {
        $work = WorkMediaFile::with("work")->where("id", $id)->first();
        if (!empty($work)) {
            $favWork = CustomerFavouriteWork::where([
                "work_media_file_id" => $id,
                "contest_id" => $work->work->contest_id
            ])->first();
            if (!empty($favWork)) {
                $favWork->status = $status;
                $favWork->update();
            } else {
                $favWork = new CustomerFavouriteWork();
                $favWork->work_media_file_id = $id;
                $favWork->contest_id = $work->work->contest_id;
                $favWork->status = $status;
                $favWork->save();
            }
            return true;
        }
        return false;
    }

    public function workReaction($designerId, $workId)
    {
        $workReaction = WorkReaction::where("designer_user_id", $designerId)->where('work_id', $workId)->first();
        if (!$workReaction) {
            $reaction = new WorkReaction();
            $reaction->designer_user_id = $designerId;
            $reaction->work_id = $workId;
            $reaction->count = 1;
            $reaction->save();

            $userReaction = new UserWorkReaction();
            $userReaction->reaction_id = $reaction->id;
            $userReaction->user_id = Auth::id();
            $reaction->save();
        } else {
            $reaction = UserWorkReaction::where('reaction_id', $workReaction->id)->where('user_id', Auth::id())->first();
            if (!$reaction) {
                $userReaction = new UserWorkReaction();
                $userReaction->reaction_id = $workReaction->id;
                $userReaction->user_id = Auth::id();
                $userReaction->save();

                $workReaction->count = $workReaction->count + 1;
                $workReaction->update();
            } else {
                $reaction->delete();

                $workReaction->count = $workReaction->count - 1;
                $workReaction->update();
            }
        }
        return true;
    }

    public function deleteWork($id)
    {
        $workMediaFile = WorkMediaFile::find($id);

        $customerWork = CustomerFavouriteWork::where('work_media_file_id', $workMediaFile->id)->first();
        if ($customerWork) {
            $customerWork->delete();
        }

        if ($workMediaFile) {
            // Delete the file from local storage
            $filePath = public_path($workMediaFile->src);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // Delete the file record from the database
            $workMediaFile->delete();
            return response()->json(['success' => true, 'message' => 'File deleted successfully']);
        }
        return response()->json(['success' => false, 'message' => 'File not found']);
    }


    public function getUploadWorks($id)
    {
        $work = Work::find($id);
        if ($work->expires_at < Carbon::now() && Auth::user()->user_type == 'Designer') {
            return redirect()->back()->with("error", "Time expire for uploading");
        }
        $winnerFiles = WinnerMediaFile::where('work_id', $id)->first();
        if ($winnerFiles) {
            $winnerFiles->media = json_decode($winnerFiles->media, true);
        }
        return \view($this->briefCompetitionView . "upload-works", compact("id", "winnerFiles", "work"));
    }

    public function uploadWorks(Request $request)
    {
        if (Auth::user()->user_type !== 'Designer') {
            return response()->json([
                'success' => false,
                'message' => 'not allowed',
            ]);
        }
        $userAttachmentPublicPath = public_path("/winner/" . $request->id . "/");

        //create dynamic directory
        if (!File::isDirectory($userAttachmentPublicPath)) {
            File::makeDirectory($userAttachmentPublicPath, 0755, true);
        }
        $file = Storage::disk('winner_uploads')->put($request->id, $request->file);
        $fileType = $request->file->getClientOriginalExtension();
        $mimeType = $request->file->getMimeType();

        $winnerFiles = WinnerMediaFile::where('work_id', $request->id)->first();
        if (!$winnerFiles) {

            $media = [
                $request->key_class => [
                    [
                        'id' => $request->index_class,
                        'file' => 'winner/' . $file,
                        'extension' => $fileType,
                        'type' => explode('/', $mimeType)[0],
                        'no_of_request' => 0,
                        'request_changes' => [],
                    ]
                ]
            ];
            $newRecord = new WinnerMediaFile();
            $newRecord->work_id = $request->id;
            $newRecord->score = 1;
            $newRecord->media = json_encode($media);
            $newRecord->save();
            return response()->json([
                'success' => true,
                'file_name' => asset($file),
                'message' => 'The work has been updated successfully',
            ]);
        } else {
            $mediaFile = json_decode($winnerFiles->media, true);
            if (isset($mediaFile[$request->key_class])) {
                // Find the item with the matching key and index
                $indexToUpdate = null;
                foreach ($mediaFile[$request->key_class] as $index => $item) {
                    if ($item['id'] == $request->index_class) {
                        $indexToUpdate = $index;
                        break;
                    }
                }

                if ($indexToUpdate !== null) {

                    $filePath = public_path($mediaFile[$request->key_class][$indexToUpdate]['file']);
                    if (File::exists($filePath)) {
                        File::delete($filePath);
                    }
                    $mediaFile[$request->key_class][$indexToUpdate] = [
                        'id' => $request->index_class,
                        'file' => 'winner/' . $file,
                        'extension' => $fileType,
                        'type' => explode('/', $mimeType)[0],
                        'no_of_request' => $mediaFile[$request->key_class][$indexToUpdate]['request_no'] ?? 0,
                        'request_changes' => $mediaFile[$request->key_class][$indexToUpdate]['request_changes'] ?? [],
                    ];

                    // Convert the updated array back to JSON
                    $updatedMedia = json_encode($mediaFile);

                    // Update the record in the database with the updated JSON
                    $winnerFiles->media = $updatedMedia;
                    $winnerFiles->save();

                    return response()->json([
                        'success' => true,
                        'file_name' => asset($file),
                        'message' => 'The work has been updated successfully',
                    ]);
                } else {
                    $mediaFile[$request->key_class][] = [
                        'id' => $request->index_class,
                        'file' => 'winner/' . $file,
                        'extension' => $fileType,
                        'type' => explode('/', $mimeType)[0],
                        'no_of_request' => 0,
                        'request_changes' => [],
                    ];

                    // Convert the updated array back to JSON
                    $updatedMedia = json_encode($mediaFile);

                    // Update the record in the database with the updated JSON
                    $winnerFiles->score = $winnerFiles->score + 1;
                    $winnerFiles->media = $updatedMedia;
                    $winnerFiles->save();
                    // Handle the case when the item with the specified index is not found
                    return response()->json([
                        'success' => true,
                        'file_name' => asset($file),
                        'message' => 'The work has been updated successfully',
                    ]);
                }
            } else {
                $mediaFile[$request->key_class][] = [
                    'id' => $request->index_class,
                    'file' => 'winner/' . $file,
                    'extension' => $fileType,
                    'type' => explode('/', $mimeType)[0],
                    'no_of_request' => 0,
                    'request_changes' => [],
                ];

                // Convert the updated array back to JSON
                $updatedMedia = json_encode($mediaFile);

                // Update the record in the database with the updated JSON
                $winnerFiles->score = $winnerFiles->score + 1;
                $winnerFiles->media = $updatedMedia;
                $winnerFiles->save();
                // Handle the case when the item with the specified index is not found
                return response()->json([
                    'success' => true,
                    'file_name' => asset($file),
                    'message' => 'The work has been updated successfully',
                ]);
            }
        }
    }

    public function download($folder, $id, $file)
    {
        // Assuming $id is the file name
        $filePath = public_path("{$folder}/{$id}/{$file}");

        if (File::exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }

    public function sendRequest(Request $request)
    {
        $winnerFiles = WinnerMediaFile::where('work_id', $request->workId)->first();
        $mediaFile = json_decode($winnerFiles->media, true);

        foreach ($mediaFile[$request->type] as $key => $file) {
            if ($file['id'] == $request->id) {
                $mediaFile[$request->type][$key] = [
                    'id' => $file['id'],
                    'file' => $file['file'],
                    'extension' => $file['extension'],
                    'type' => $file['type'],
                    'no_of_request' => $file['no_of_request'] + 1,
                    'request_changes' => array_merge($file['request_changes'], [$request->requestChange]),
                ];

                // Convert the updated array back to JSON
                $updatedMedia = json_encode($mediaFile);

                // Update the record in the database with the updated JSON
                $winnerFiles->media = $updatedMedia;
                $winnerFiles->save();
            }
        }

        return redirect()->back()->with("success", "Send Request changes");
    }

    public function distributeReward($id)
    {
        $works = Work::where('contest_id', $id)->get();

        foreach ($works as $work) {
            $contestPrice = $work->contest->contest_price;

            switch ($work->place) {
                case 1:
                    $work->reward = 0.85 * $contestPrice;
                    break;
                case 2:
                    $work->reward = 0.1 * $contestPrice;
                    break;
                case 3:
                    $work->reward = 0.05 * $contestPrice;
                    break;
                default:
                    // Handle other places if needed
                    break;
            }

            $work->save();
        }

        return redirect()->back()->with("success", "reward successfully distributed to the winners");
    }
}
