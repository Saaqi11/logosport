<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
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

    public function logout() {
        Session::flush();
        Auth::logout();
        Session::flash('success', 'You are logged out.');
        return redirect("/");
    }
}
