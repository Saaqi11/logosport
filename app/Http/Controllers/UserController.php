<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

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
        $user->save();

        $credentials = $request->only(['email', 'password']);
        Auth::attempt($credentials);
        if ($request->user_type === "Designer") {
            $user->assignRole("Designer");
            $route = "home";
        } else if($request->user_type === "Customer") {
            $user->assignRole("Customer");
            $route = "customer.contest.price";
        }
        return redirect()->route($route)->with("success", "Your account has been created!");
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
    public function generalSave(Request $request): RedirectResponse
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
            $user->behance = $inputs['behance'];
            $user->about_me = $inputs['about_me'];
            $user->gender = $inputs['gender'];
            $user->telephone = $inputs['telephone'];
            $user->email = $inputs['email'];
            $user->dribble = $inputs['dribble'];
            $user->other = $inputs['other'];
            $user->update();
        }

        return redirect()->route("user.general")->with("success", "Your general data has been updated");
    }
}
