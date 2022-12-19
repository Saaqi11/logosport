<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post("/login", [UserController::class, 'doLogin'])->name("user.login");
Route::get("/user-logout", [UserController::class, 'logout'])->name("user.logout");

Route::get('/', function () {
    return view('index');
});
