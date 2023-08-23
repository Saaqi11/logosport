<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\ContestStyle;
use App\Models\DefaultLogo;
use App\Models\FavouriteContest;
use App\Models\LogoColor;
use App\Models\Media;
use App\Models\User;
use App\Models\UserDefaultLogo;
use App\Models\WorkParticipants;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ContestController extends Controller
{
    private string $contestSteps = "customer.contest.steps.";

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $user_id = Auth::id();
        $contests = Contest::select(
            'id',
            'company_name',
            'contest_price',
            'status',
            'is_paid',
            'score',
            DB::raw('(SELECT COUNT(*) FROM works WHERE contest_id = contests.id) as total_works'),
            DB::raw('(SELECT COUNT(*) FROM works WHERE contest_id = contests.id AND status = 1) as selected_works')
        )
            ->where('user_id', $user_id)
            ->get();
        return \view("customer.contest.index", compact("contests"));
    }

    /**
     * Show the form for creating a new resource.
     * @param $id
     * @return View
     */
    public function price($id = null): View
    {
        if ($id) {
            $contest = Contest::findOrFail($id);
            return view($this->contestSteps . "price", compact("contest"));
        }
        return view($this->contestSteps . "price");
    }

    /**
     * Save price form.
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function priceSave(Request $request, $id = null): RedirectResponse
    {
        $inputs = $request->only(['contest_price', 'business_level']);
        $inputs['user_id'] = \auth()->user()->id;
        if ($id) {
            $contest = Contest::findOrFail($id);
            if (!empty($contest)) {
                $contest = $contest->update($inputs);
            } else {
                return redirect()->route("customer.contest.price")->with("error", "Please create any contest!");
            }
        } else {
            $inputs['score'] = 20;
            $contest = Contest::create($inputs);
        }
        return redirect()->route("customer.contest.type", $contest->id)->with("success", "The contest price has been saved successfully!");
    }

    /**
     * Show type page.
     * @param $id
     * @return View
     */
    public function type($id): View
    {
        $contest = Contest::findOrFail($id);
        $defaultLogos = DefaultLogo::all();
        return view($this->contestSteps . "type", compact("contest", "defaultLogos"));
    }

    /**
     * Save type of contest
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function typeSave(Request $request, $id): RedirectResponse
    {
        $request->validate([
            "base64_images" => "required"
        ]);
        $inputs = $request->only(['default_logos', 'base64_images']);
        if (!empty($inputs['default_logos'])) {
            $defaultLogos = explode(",", $inputs['default_logos']);
            foreach ($defaultLogos as $defaultLogo) {
                $dLogo = new UserDefaultLogo();
                $dLogo->default_logo_id = $defaultLogo;
                $dLogo->user_id = \auth()->user()->id;
                $dLogo->contest_id = $id;
                $dLogo->save();
            }
        }
        if (!empty($inputs['base64_images'])) {
            $images = json_decode($inputs['base64_images'], true);
            foreach ($images as $image) {
                $media = new Media();

                $userAdsImagesBasePath = "images/contests/" . Auth::id() . "/";
                //create dynamic directory

                if (!File::isDirectory($userAdsImagesBasePath)) {
                    File::makeDirectory($userAdsImagesBasePath, 0755, true);
                }
                $imageParts = explode(";base64,", $image);
                $imageTypeAux = explode("image/", $imageParts[0]);
                $imageType = $imageTypeAux[1];
                $imageBase64 = base64_decode($imageParts[1]);
                $fileName = "contest_" . Auth::id() . "_" . time() . '.' . $imageType;
                $imagePath = public_path() . "/" .$userAdsImagesBasePath . $fileName;

                File::put($imagePath, $imageBase64);
                $media->src = $userAdsImagesBasePath . $fileName;
                $media->contest_id = $id;
                $media->user_id = Auth::id();
                $media->save();
            }
        }
        $this->updateContestScore($id, 40);
        return redirect()->route("customer.contest.color", $id)->with("success", "The type of contest has been saved!");
    }

    /**
     * show view of color page
     * @param $id
     * @return View
     */
    public function color($id): View
    {
        return \view($this->contestSteps . "color", compact("id"));
    }

    /**
     * Save color data
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function colorSave(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'color' => 'required'
        ]);
        $inputs = $request->only(['color']);
        if (!empty($inputs['color']) && count($inputs['color']) > 0) {
            foreach ($inputs['color'] as $colorCode) {
                $color = new LogoColor();
                $color->user_id = \auth()->user()->id;
                $color->contest_id = $id;
                $color->color_name = $colorCode;
                $color->save();
            }
        }
        $this->updateContestScore($id, 50);
        return redirect()->route("customer.contest.style", $id)->with("success", "The Color of contest has been saved!");
    }

    /**
     * Show customer contest style
     * @param $id
     * @return View
     */
    public function style($id): View
    {
        return \view($this->contestSteps . "style", compact("id"));
    }

    /**
     * Save style of contest
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function styleSave(Request $request, $id): RedirectResponse
    {
        $request->validate([
            "style" => "required"
        ]);
        $inputs = [];
        $inputs['style_json'] = json_encode($request->only(['style']));
        $inputs["user_id"] = \auth()->user()->id;
        $inputs["contest_id"] = (int)$id;
        ContestStyle::create($inputs);
        $this->updateContestScore($id, 60);
        return redirect()->route("customer.contest.brief", $id)->with("success", "The style of contest has been saved!");
    }

    /**
     * Show brief page
     * @param $id
     * @return View
     */
    public function brief($id): View
    {
        return \view($this->contestSteps . "brief", compact("id"));
    }

    /**
     * Brief save option
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function briefSave(Request $request, $id): RedirectResponse
    {
        $inputs = $request->only([
            "company_name",
            "slogan",
            "website",
            "industry_type",
            "company_features",
            "logo_type_likes",
            "logo_type_unlikes",
        ]);

        $contest = Contest::findOrFail($id);
        if (!empty($contest)) {
            if ($request->hasFile("doc_file")) {
                $userAttachmentPublicPath = public_path("/contests-attachments/" . Auth::id() . "/");
                //create dynamic directory
                if (!File::isDirectory($userAttachmentPublicPath)) {
                    File::makeDirectory($userAttachmentPublicPath, 0755, true);
                }
                $userAttachmentPath = "/contests-attachments/" . Auth::id() . "/" . $request->doc_file->getClientOriginalName();
//                dd($request->doc_file->getClientOriginalName());
//                $filePath = Storage::disk('local')->put($userAttachmentPath, $request->doc_file);
                File::put($userAttachmentPublicPath . $request->doc_file->getClientOriginalName(), $request->doc_file);
                $inputs["doc_file"] = $userAttachmentPath;
            }
            $inputs["score"] = 80;
            $contest->update($inputs);
        } else {
            return redirect()->route("customer.contest.brief.save", $id)->with("error", "Something went wrong, Please try again!");
        }
        return redirect()->route("customer.contest.condition", $id)->with("success", "The brief of contest has been saved!");
    }

    /**
     * Show condition page
     * @param $id
     * @return View
     */
    public function condition($id): View
    {
        $users = User::with("works.reactions", "reactions")->whereHas(
            'roles', function ($q) {
            $q->where('name', 'Designer');
        })->orderBy("id", "Desc")->take(5)->get();

        return \view($this->contestSteps . "condition", compact("id", "users"));
    }

    /**
     * Save last step of contest
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function conditionSave(Request $request, $id): RedirectResponse
    {
        $request->validate([
            "duration" => "required",
            "start_date" => "required"
        ]);
        $inputs = $request->only(["duration", "start_date", "selected_designers_json"]);
        $invitedDesigners = json_decode($inputs['selected_designers_json'], true);
        if (!empty($invitedDesigners)) {
            foreach ($invitedDesigners as $user) {
                $workParticipant = array(
                    "contest_id" => $id,
                    "designer_user_id" => $user,
                    "status" => 0
                );
                WorkParticipants::create($workParticipant);
            }
        }
        unset($inputs['selected_designers_json']);
        $contest = Contest::findOrFail($id);
        if (!empty($contest)) {
            $inputs["score"] = 100;
            $contest->update($inputs);
        }
        return redirect()->route("customer.contest.view")->with("success", "The Contest has been saved Successfully!");
    }

    /**
     * Update the score of contest
     * @param $id
     * @param $score
     * @return void
     */
    public function updateContestScore($id, $score): void
    {
        $contest = Contest::findOrFail($id);
        if (!empty($contest)) {
            $contest->score = $score;
            $contest->update();
        }
    }

    /**
     * Cancel the project
     * @param $id
     * @return RedirectResponse
     */
    public function cancel($id): RedirectResponse
    {
        $contest = Contest::where("id", $id)->first();
        if (!empty($contest)) {
            $contest->status = 3;
            $contest->update();
            return redirect()->back()->with("success", "The project has been cancelled");
        }
        return redirect()->back()->with("error", "Something went wrong");
    }

    /**
     * Get finished contests
     * @return View
     */
    public function finished(): View
    {
        $user_id = Auth::id();
        $contests = Contest::select(
            'id',
            'company_name',
            'contest_price',
            'status',
            'is_paid',
            'score',
            DB::raw('(SELECT COUNT(*) FROM works WHERE contest_id = contests.id) as total_works'),
            DB::raw('(SELECT COUNT(*) FROM works WHERE contest_id = contests.id AND status = 1) as selected_works')
        )
            ->where([
                'user_id' => $user_id,
                'status' => 4
            ])
            ->get();
        return \view("customer.contest.index", compact("contests"));
    }

    /**
     * Get active contests
     * @return View
     */
    public function active(): View
    {
        $user_id = Auth::id();
        $contests = Contest::select(
            'id',
            'company_name',
            'contest_price',
            'status',
            'is_paid',
            'score',
            DB::raw('(SELECT COUNT(*) FROM works WHERE contest_id = contests.id) as total_works'),
            DB::raw('(SELECT COUNT(*) FROM works WHERE contest_id = contests.id AND status = 1) as selected_works')
        )
            ->where('user_id',$user_id)
            ->where('status', '!=', 3)
            ->where('status', '!=', 4)
            ->get();
        return \view("customer.contest.index", compact("contests"));
    }

    /**
     * Get Cancelled contests
     * @return View
     */
    public function cancelled(): View
    {
        $user_id = Auth::id();
        $contests = Contest::select(
            'id',
            'company_name',
            'contest_price',
            'status',
            'is_paid',
            'score',
            DB::raw('(SELECT COUNT(*) FROM works WHERE contest_id = contests.id) as total_works'),
            DB::raw('(SELECT COUNT(*) FROM works WHERE contest_id = contests.id AND status = 1) as selected_works')
        )
            ->where([
                'user_id' => $user_id,
                'status' => 3
            ])
            ->get();
        return \view("customer.contest.index", compact("contests"));
    }

    /**
     * @param Request $request
     * @return JsonResponse|View
     * @throws \Exception
     */
    public function contestListing(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $query = Contest::select(
                'contests.id as contest_id',
                'contests.company_name',
                'contests.business_level',
                'contests.duration',
                'contests.contest_price',
                'contests.is_paid',
                'media.src as contest_image',
                DB::raw('(SELECT COUNT(*) FROM work_participants WHERE work_participants.contest_id = contests.id) as participants'),
                DB::raw('(SELECT COUNT(*) FROM work_participants WHERE work_participants.designer_user_id = '.Auth::id().' AND work_participants.contest_id = contests.id) as is_participated'),
                DB::raw('(SELECT COUNT(*) FROM favourite_contests WHERE favourite_contests.user_id = '.Auth::id().' AND favourite_contests.contest_id = contests.id AND favourite_contests.status = 1) as is_favourite')
            )
                ->selectRaw("CONCAT(users.first_name,  ' ', users.last_name) as name")
                ->join("users", 'contests.user_id', 'users.id')
                ->leftJoin("media", 'media.contest_id', 'contests.id');
            if ($request->get("is_favourite") && $request->get("is_favourite") === "true") {
                $query->join("favourite_contests", "favourite_contests.contest_id", "contests.id");
                $query->where([
                    "favourite_contests.user_id" => Auth::id(),
                    "favourite_contests.status" => 1
                ]);
            }

            if (!empty($request->get('search')['value'])) {
                $query->where('contests.company_name', 'like', '%' . $request->get('search')['value'] . '%');
            }
            if (!empty($request->get('business_level'))) {
                $query->where('contests.business_level', 'like', '%' . $request->get('business_level') . '%');
            }
            if (!empty($request->get('contest_price'))) {
                $query->where('contests.contest_price', '>',  (float)$request->get('contest_price'));
            }
            if (!empty($request->get('status'))) {
                if ((int)$request->get('status') === 2 ) {
                    $query->where('contests.status', '<=',(int)$request->get('status'));
                } else {
                    $query->where('contests.status', (int)$request->get('status'));
                }
            }
            $query->where('contests.status', '!=', 3);
            $query->where('contests.score', 100);
            if (!empty($request->get('participants'))) {
                $query->having('participants', '<', $request->get('participants'));
            }
            $query->groupBy(
                'contests.id',
                'contests.company_name',
                'contests.business_level',
                'contests.duration',
                'contests.contest_price',
                'contests.is_paid',
                'users.first_name',
                'users.last_name',
                'contest_image',
            );

            return DataTables::of($query)
                ->addColumn("html", function($row) {
                    $paymentStatus = $row->is_paid ? "Paid" : "Unpaid";
                    $participatedHtml = $row->is_participated ? "<span class='participated-span'>Participated</span>" : '<a href="'.route('contest.participate', ['contest_id' => $row->contest_id]).'" class="button" >Participate</a>';
                    $isFavourite = $row->is_favourite ? "fas" : "far";
                    return '
                    <div class="row">
                        <div class="col">
                            <img src="'.$row->contest_image.'" alt="">
                        </div>
                        <div class="col-6">
                            <div class="description">
                                <div class="contest-heading">
                                    <div class="contest-title">
                                        <h3>
                                            <a href="'.route("competition.show", [$row->contest_id]).'">'.$row->company_name.'</a>
                                             &nbsp; <i class="'.$isFavourite.' fa-star" data-id="'.$row->contest_id.'"></i>
                                        </h3>
                                    </div>                              
                                </div>
                                <div class="lmt">
                                    <p class="limit">
                                        Time limit: <span>'.$row->duration.' day(s)</span>
                                    </p>
                                    <p class="customer">
                                        Customer: <span>'.$row->name.'</span>
                                    </p>
                                    <p class="customer">
                                        Participants: <span>'.$row->participants.'</span>
                                    </p>
                                </div>
                                <div class="ftr">
                                    <p class="smal">
                                        '.$row->business_level.'
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="dol">
                                <h2>
                                    $'.$row->contest_price.' 
                                </h2>
                                <p class="payment-status">
                                    Price('.$paymentStatus.')
                                </p>
                                <p class="participation-para">'.$participatedHtml.'</p>
                            </div>
                        </div>
                    </div>
                    ';
                })
                ->rawColumns(['html'])
                ->toJson();
        }
        return \view("customer.contest.listing");
    }

    /**
     * Contest participate
     * @param $contestId
     * @return RedirectResponse
     */
    public function contestParticipate($contestId): RedirectResponse
    {
        $participant = WorkParticipants::where([
            'contest_id' => $contestId,
            'designer_user_id' => Auth::id()
        ])->first();
        if (empty($participant)) {
            $participate = new WorkParticipants();
            $participate->contest_id = $contestId;
            $participate->designer_user_id = Auth::id();
            $participate->save();
            return redirect()->back()->with('success', 'You are successfully participated in the contest.');
        }
        return redirect()->back()->with('error', 'You already participated in this contest.');
    }

    /**
     * contest favourite
     * @param $contestId
     * @param $status
     * @return JsonResponse
     */
    public function favouriteContest($contestId, $status): JsonResponse
    {
        $favouriteContest = FavouriteContest::where([
            'user_id' => Auth::id(),
            'contest_id' => $contestId
        ])->first();
        $response = [
            'status' => 1,
            'message' => "Contest marked as a favourite"
        ];
        if (!empty($favouriteContest)) {
            $favouriteContest->status = $status;
            $favouriteContest->update();
            $response['status'] = (int)$status === 1 ? 1 : 0;
            $response['message'] = (int)$status === 1 ? "Contest marked as a favourite" : "Contest unmarked as a favourite";
        } else {
            $newFavouriteContest = new FavouriteContest();
            $newFavouriteContest->user_id = Auth::id();
            $newFavouriteContest->contest_id = $contestId;
            $newFavouriteContest->status = $status;
            $newFavouriteContest->save();
        }
        return response()->json($response);
    }
}