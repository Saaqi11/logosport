<?php

use App\Http\Controllers\ContestController;
use App\Http\Controllers\CustomerController;
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

Route::prefix('auth')->name('auth.')->group(function () {
    Route::name('social.')->group(function () {
        Route::get('{type}/login', [UserController::class, 'redirectToSocialLogin'])->name("login");
        Route::get('{type}/callback', [UserController::class, 'handleSocialCallback'])->name("callback");
    });
});
Route::post("/login", [UserController::class, 'doLogin'])->name("user.login");
Route::get("/signup", [UserController::class, 'signUp'])->name("user.signup");
Route::post("/do-signup", [UserController::class, 'doSignUp'])->name("user.doSignup");
Route::get("/user-logout", [UserController::class, 'logout'])->name("user.logout");

Route::get("get-city/{id}", [UserController::class, 'getCities']);
Route::get("states-city/{id}", [UserController::class, 'getStates']);


Route::group(['middleware' => 'auth'], function () {
    //User
    Route::prefix('user')->name('user.')->group(function () {
        Route::post("/type", [UserController::class, 'userType'])->name("type");
        Route::get("/general", [UserController::class, 'general'])->name("general");
        Route::post("/general/save", [UserController::class, 'generalSave'])->name("general.save");
        Route::get("/notification", [UserController::class, 'notification'])->name("notification");
        Route::get("/password", [UserController::class, 'password'])->name("password");
        Route::get("/verification", [UserController::class, 'verification'])->name("verification");
        //soft delete
        Route::get("/delete", [UserController::class, 'delete'])->name("delete");
    });
});

//Authenticated Routes
Route::group(['middleware' => ['auth', 'role:Customer']], function () {

    //Customer
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get("/", [CustomerController::class, 'index'])->name('view');

        //Project
        Route::prefix('contest')->name('contest.')->group(function () {
            Route::get("/", [ContestController::class, 'index'])->name('view');
            Route::get("/price/{id?}", [ContestController::class, 'price'])->name('price');
            Route::post("/price-save/{id?}", [ContestController::class, 'priceSave'])->name('price.save');
            Route::group(['middleware' => 'contest'], function ($id) {
                Route::get("/type/{id}", [ContestController::class, 'type'])->name('type');
                Route::post("/type-save/{id}", [ContestController::class, 'typeSave'])->name('type.save');
                Route::get("/color/{id}", [ContestController::class, 'color'])->name('color');
                Route::post("/color-save/{id}", [ContestController::class, 'colorSave'])->name('color.save');
                Route::get("/style/{id}", [ContestController::class, 'style'])->name('style');
                Route::post("/style-save/{id}", [ContestController::class, 'styleSave'])->name('style.save');
                Route::get("/brief/{id}", [ContestController::class, 'brief'])->name('brief');
                Route::post("/brief-save/{id}", [ContestController::class, 'briefSave'])->name('brief.save');
                Route::get("/condition/{id}", [ContestController::class, 'condition'])->name('condition');
                Route::post("/condition-save/{id}", [ContestController::class, 'conditionSave'])->name('condition.save');
            });
        });
    });
});


Route::get('/', function () {
    return view('index');
})->name("home");
