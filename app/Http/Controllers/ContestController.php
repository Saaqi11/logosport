<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Http\Requests\StoreContestRequest;
use App\Http\Requests\UpdateContestRequest;
use App\Models\DefaultLogo;
use App\Models\Media;
use App\Models\UserDefaultLogo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
            return view("customer.contest.steps.price", compact("contest"));
        }
        return view("customer.contest.steps.price");
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
            "default_logos" => "required",
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

                $userAdsImagesBasePath = "/storage/app/public/images/contests/".Auth::id()."/";
                //create dynamic directory
                if (!File::isDirectory($userAdsImagesBasePath)) {
                    File::makeDirectory($userAdsImagesBasePath, 0755, true);
                }
                $imageParts = explode(";base64,", $image);
                $imageTypeAux = explode("image/", $imageParts[0]);
                $imageType = $imageTypeAux[1];
                $imageBase64 = base64_decode($imageParts[1]);
                $fileName = "contest_".Auth::id()."_".time().'.'.$imageType;
                $imagePath = $userAdsImagesBasePath.$fileName;

                Storage::disk('local')->put($imagePath, $imageBase64);

                $media->src = $imagePath;
                $media->contest_id = $id;
                $media->user_id = \auth()->user()->id;
                $media->save();
            }
        }
        $contest = Contest::findOrFail($id);
        if (!empty($contest)) {
            $contest->score = 40;
            $contest->update();
        }
        return redirect()->route("customer.contest.color", $id)->with("success", "The type of contest has been saved!");
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
                return redirect()->route("customer.project.create")->with("error", "Please create any contest!");
            }
        } else {
            $inputs['score'] = 20;
            $contest = Contest::create($inputs);
        }
        return redirect()->route("customer.contest.type", $contest->id);
    }

    /**
     * Show type page.
     * @param $id
     * @return View | RedirectResponse
     */
    public function type($id): View | RedirectResponse
    {
        $contest = Contest::findOrFail($id);
        $defaultLogos = DefaultLogo::all();
        return view("customer.contest.steps.type", compact("contest", "defaultLogos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContestRequest $request
     * @return Response
     */
    public function store(StoreContestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Contest $contest
     * @return Response
     */
    public function show(Contest $contest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contest $contest
     * @return Response
     */
    public function edit(Contest $contest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContestRequest $request
     * @param Contest $contest
     * @return Response
     */
    public function update(UpdateContestRequest $request, Contest $contest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contest $contest
     * @return Response
     */
    public function destroy(Contest $contest)
    {
        //
    }
}
