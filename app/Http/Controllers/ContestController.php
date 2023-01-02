<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Http\Requests\StoreContestRequest;
use App\Http\Requests\UpdateContestRequest;
use App\Models\ContestStyle;
use App\Models\DefaultLogo;
use App\Models\LogoColor;
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
        return \view("customer.contest.steps.color", compact("id"));
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
        if (!empty($inputs['color']) && count($inputs['color']) > 0)
        {
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
        return \view("customer.contest.steps.style", compact("id"));
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
        $inputs["contest_id"] = (int) $id;
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
        return \view("customer.contest.steps.brief", compact("id"));
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
            "company_employees_range",
            "industry_type",
            "company_about",
            "company_features",
            "logo_type_likes",
            "logo_type_unlikes",
            "company_advantages",
        ]);

        $contest = Contest::findOrFail($id);
        if (!empty($contest)) {
            if ($request->hasFile("doc_file")){
                $userAttachmentPath = "/storage/app/public/contests-attachments/".Auth::id()."/";
                //create dynamic directory
                if (!File::isDirectory($userAttachmentPath)) {
                    File::makeDirectory($userAttachmentPath, 0755, true);
                }
                $filePath = Storage::disk('local')->put($userAttachmentPath, $request->doc_file);
                $inputs["doc_file"] = $filePath;
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
        return \view("customer.contest.steps.condition", compact("id"));
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
}
