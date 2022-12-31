<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function doLogin(Request $request)
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
    public function logout() {
        Session::flush();
        Auth::logout();
        Session::flash('success', 'You are logged out.');
        return redirect("/");
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
        $user->save();
        $credentials = $request->only(['email', 'password']);
        Auth::attempt($credentials);
        if ($request->user_type === "Designer") {
            $user->assignRole("Designer");
            $route = "designer.dashboard";
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
}
