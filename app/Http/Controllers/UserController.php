<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Notification;
use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use PHPUnit\Framework\Constraint\Count;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function doLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Session::flash('success', 'User has been logged In.');
            return redirect("/");
        }
        Session::flash('error', 'You have entered wrong credentials.');
        return redirect("/")->with('Login details are not valid');
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        Session::flash('success', 'You are logged out.');
        return redirect()->route("home");
    }

    /**
     * @param SignUpRequest $request
     * @return RedirectResponse
     */
    public function doSignUp(Request $request): RedirectResponse
    {
        $request->validate([
            "user_type" => "required",
            "first_name" => "required",
            "last_name" => "required",
            "email"     => "required|email|unique:users",
            "username" => "unique:users,username",
            "password" => "required_with:confirm_password|same:confirm_password",
            "confirm_password" => "required",
        ]);
        $user = new User();
        $user->user_type = $request->user_type;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        if ($request->user_type === "Designer") {
            $user->behance = $request->behance;
            $user->dribble = $request->dribble;
            $user->other = $request->other;
        }
        $user->code = rand(1000,9999);
        $user->code_expires_at = Carbon::now()->addHour();
        $user->save();
        $this->sendVerificationEmail($user);

        $credentials = $request->only(['email', 'password']);
        Auth::attempt($credentials);
        if ($request->user_type === "Designer") {
            $user->assignRole("Designer");
        } else if($request->user_type === "Customer") {
            $user->assignRole("Customer");
        }
        return redirect()->route("verify-user")->with("success", "Your account has been created!");
    }

    /**
     * Verify user
     * @return View
     */
    public function verifyUser(): View
    {
        return \view("verify-user");
    }

    /**
     * show signup page
     * @return View
     */
    public function signUp(): View
    {
        return view("signup");
    }

    /**
     * Redirect user to google.
     * @param $type
     * @return RedirectResponse
     */
    public function redirectToSocialLogin($type): RedirectResponse
    {
        return Socialite::driver($type)->redirect();
    }

    /**
     * Add User Type.
     * @param Request $request
     * @return RedirectResponse
     */
    public function userType(Request $request): RedirectResponse
    {
        $route = "";
        $user = User::where("id", Auth::user()->id)->first();
        if ($request->user_type === "Designer") {
            $user->assignRole("Designer");
            $user->user_type = "Designer";
            $route = "designer.dashboard";
        } else if($request->user_type === "Customer") {
            $user->assignRole("Customer");
            $user->user_type = "Customer";
            $route = "customer.contest.price";
        }
        $user->update();
        return redirect()->route($route)->with("success", "Thanks for registering your account");
    }

    /**
     * Handle google call back
     * @param $type
     * @return RedirectResponse | View
     */
    public function handleSocialCallback($type): RedirectResponse | View
    {
        try {
            $user = Socialite::driver($type)->user();
            $findUser = User::where('email', $user->email)->first();
            if($findUser){
                Auth::login($findUser);
            } else {
                $name = explode(" ", $user->name);
                $newUser = new User();
                $newUser->first_name = $name[0];
                $newUser->last_name = $name[1];
                $newUser->email = $user->email;
                $newUser->password = encrypt('logosporte@123');
                $newUser->save();
                Auth::login($newUser);
                return \view("user.user_type")->with("success", "Your account has been created and Please Select One Option to continue!");
            }
            return redirect()->route('home')->with("success", "You have been logged in!");
        } catch (\Exception $e) {
            return redirect()->route('home')->with("success", "Something went wrong. Please login with email and password at the moment!");
        }
    }

    /**
     * Show general view
     * @return View
     */
    public function general(): View
    {
        $countries = Country::all();
        $user = Auth::user();
        $cities = [];
        if (!empty($user->country)) {
            $cities = City::where("country_id", $user->country)->get();
        }
        return \view("user.general", compact("user", "countries", "cities"));
    }

    /**
     * Delete user
     * @return RedirectResponse
     */
    public function delete(): RedirectResponse
    {
        $user = User::find(Auth::id());
        $user->delete();

        //remove user from login session
        Session::flush();
        Auth::logout();
        return redirect()->route("home")->with("success", "Your account has been deleted successfully.");
    }

    /**
     * Get cities against country
     * @param $id
     * @return string
     */
    public function getCities($id): string
    {
        $response = [
            "message" => "Please choose any country first"
        ];
        if (!empty($id)) {
            $cities = City::where("country_id", $id)->get();
            if ($cities->count() > 0){
                $response = [
                    "message" => "Cities found for this country",
                    "cities" => $cities
                ];
            } else {
                $response = [
                    "message" => "No city found for this country",
                    "cities" => []
                ];
            }
        }
        return json_encode($response);
    }

    /**
     * Update general data of user
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateGeneral(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'unique:users,email,'.Auth::id(),
            'username' => 'unique:users,username,'.Auth::id(),
            "first_name" => "required",
            "last_name" => "required",
        ]);
        $inputs = $request->all();
        unset($inputs["_token"]);
        $user = User::find(Auth::id());
        if (!empty($user)) {
            $user->first_name = $inputs['first_name'];
            $user->last_name = $inputs['last_name'];
            $user->username = $inputs['username'];
            $user->country = $inputs['country'];
            $user->city = $inputs['city'];
            $user->behance = @$inputs['behance'];
            $user->about_me = $inputs['about_me'];
            $user->gender = $inputs['gender'];
            $user->telephone = $inputs['telephone'];
            $user->email = $inputs['email'];
            $user->dribble = @$inputs['dribble'];
            $user->other = @$inputs['other'];
            $user->update();
        }

        return redirect()->route("user.general")->with("success", "Your general data has been updated");
    }

    /**
     * Show password view
     * @return View
     */
    public function password(): View
    {
        return \view("user.password");
    }

    /**
     * Save updated password
     * @param Request $request
     * @return RedirectResponse
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $inputs = $request->all();
        if (Hash::check($inputs['old_password'], auth()->user()->password)) {
            $request->validate([
                "password" => "required_with:confirm_password|same:confirm_password",
                "confirm_password" => "required"
            ]);
            $user = User::find(Auth::id());
            $user->password = Hash::make($inputs['password']);
            $user->update();
            return redirect()->route("user.password")->with("success", "Your Password has been changed successfully");
        } else {
            return redirect()->route("user.password")->with("error", "Your old Password is incorrect");
        }
    }

    /**
     * show user notifications
     * @return View
     */
    public function notification(): View {
        $notification = Notification::where("user_id", Auth::id())->first();
        $notificationArray = [];
        if (!empty($notification)) {
            $notificationArray = json_decode($notification->notifications, true);
            $notificationArray["active"] = explode(",",$notificationArray["active"]);
            $notificationArray["inactive"] = explode(",",$notificationArray["inactive"]);
            unset($notificationArray["active"][count($notificationArray["active"])-1]);
            unset($notificationArray["inactive"][count($notificationArray["inactive"])-1]);
        }
        return \view("user.notification", compact("notificationArray"));
    }

    /**
     * Update notification data
     * @param Request $request
     * @return string
     */
    public function updateNotification(Request $request): string {
        $notification = Notification::where("user_id", Auth::id())->first();
        $response = "";
        if (!empty($notification) && $notification->count() > 0) {
            $notification->notifications = $request->notification_json;
            $notification->update();
            $response = "Your notifications setting has been updated!";
        } else {
            $notification = new Notification();
            $notification->notifications = $request->notification_json;
            $notification->user_id = Auth::id();
            $notification->save();
            $response = "Your notifications setting has been saved!";
        }
        return $response;
    }

    /**
     * Show verification module
     * @return View
     */
    public function verification(): View {
        $countries = Country::all();
        $verification = Verification::where("user_id", Auth::id())->first();
        return \view("user.verification", compact("verification", "countries"));
    }

    /**
     * Save Verification data
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveVerification(Request $request): RedirectResponse
    {
        $request->validate([
            "country" => "required",
            "document_type" => "required",
            "first_image" => "required",
            "second_image" => "required"
        ]);
        $inputs = $request->all();
        $documentArr = [];
        if (!empty($inputs['first_image']) && !empty($inputs["second_image"])) {
            $documentArr = [
                "firstImage" => $this->imageUpload($inputs['first_image']),
                "secondImage" => $this->imageUpload($inputs['second_image'])
            ];
        }
        $verification = new Verification();
        $verification->user_id = Auth::id();
        $verification->country = $inputs['country'];
        $verification->document_type = $inputs["document_type"];
        $verification->document_file_json = json_encode($documentArr);
        $verification->save();
        return  redirect()->route("user.general")->with("success", "Your documents has been submitted for approval");
    }

    /**
     * upload image
     * @param $image
     * @return string
     */
    private function imageUpload($image): string
    {
        $userAdsImagesBasePath = "/storage/app/public/images/verification/".Auth::id()."/";
        //create dynamic directory
        if (!File::isDirectory($userAdsImagesBasePath)) {
            File::makeDirectory($userAdsImagesBasePath, 0755, true);
        }
        $fileName = "contest_".Auth::id()."_".time().'.'.$image->getClientOriginalName();
        $imagePath = $userAdsImagesBasePath.$fileName;
        Storage::disk('local')->put($imagePath, $image);
        return $imagePath;
    }



    /**
     * @param $user
     */
    private function sendVerificationEmail($user) {
        $user = json_decode(json_encode($user), true);
        $user['name'] = $user['first_name']." ".$user['last_name'];
        // send email with the template
        try {
            Mail::send('emails.user-verification', $user, function ($message) use ($user) {
                $message->to($user['email'], $user['name'])
                    ->subject('Please Verify your Account')
                    ->from(env("MAIL_USERNAME"), env("MAIL_FROM_NAME"));
            });
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * @return RedirectResponse
     */
    public function reSendVerificationEmail(): RedirectResponse
    {
        $user = User::where('email', Auth::user()->email)->first();
        $user->code = rand(1000, 9999);
        $user->code_expires_at = Carbon::now()->addHour();
        $user->update();
        $this->sendVerificationEmail($user);
        return redirect("verify-user");
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function verifyEmail(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            $user = User::where('email', Auth::user()->email)->first();
            if (!Auth::user()->email_verified_at) {
                if ($user->code_expires_at > Carbon::now()){
                    if ($user->code === $request->code) {
                        $user->email_verified_at = date('Y-m-d H:i:s');
                        $user->code = null;
                        $user->code_expires_at = null;
                        $user->update();
                        $message = 'Your account has been verified';
                        return redirect()->route("home")->with("success", $message);
                    } else {
                        $message = 'Wrong Code Entered.';
                    }
                } else {
                    $message = 'Time Expired for code. Please resend verification email';
                }
            } else {
                $message = 'User is already verified.';
            }
            return redirect()->back()->with("error", $message);
        } else {
            return redirect()->back()->with("error", "The OTP you entered is incorrect");
        }
    }
}
