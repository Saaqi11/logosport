<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DesignerWorkController;
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
    Route::get('/send-email-verification', [UserController::class, 'reSendVerificationEmail'])->name("send-email-verification")
        ->middleware('throttle:1,1');
    Route::post('/verify-email', [UserController::class, 'verifyEmail'])->name('verify-email');
    Route::get('/verify-user', [UserController::class, 'verifyUser'])->name('verify-user');

    Route::group(['middleware' => 'verified-user'], function () {
        //User
        Route::prefix('user')->name('user.')->group(function () {
            Route::post("/type", [UserController::class, 'userType'])->name("type");
            Route::get("/general", [UserController::class, 'general'])->name("general");
            Route::post("/general/update", [UserController::class, 'updateGeneral'])->name("general.update");
            Route::get("/password", [UserController::class, 'password'])->name("password");
            Route::post("/password/update", [UserController::class, 'updatePassword'])->name("password.update");
            Route::get("/notification", [UserController::class, 'notification'])->name("notification");
            Route::post("/notification/update", [UserController::class, 'updateNotification'])->name("notification.update");
            Route::get("/verification", [UserController::class, 'verification'])->name("verification");
            Route::post("/verification/save", [UserController::class, 'saveVerification'])->name("verification.save");
            //soft delete
            Route::get("/delete", [UserController::class, 'delete'])->name("delete");
            Route::prefix('cabinet')->name('cabinet.')->group(function () {
                Route::get("/my-all-works", [DesignerWorkController::class, 'myAllWorks'])->name("my-all-works");
            });
        });
        //Competition
        Route::prefix('competition')->name('competition.')->group(function () {
            Route::get("/show-contest-brief/{id}", [CompetitionController::class, 'showBrief'])->name('show');
            Route::get("/round-one/{id}", [CompetitionController::class, 'roundOne'])->name('round.one');
            Route::get("/round-two/{id}", [CompetitionController::class, 'roundTwo'])->name('round.two');
            Route::post("/save-work/{id}", [CompetitionController::class, 'saveWork'])->name('save.work');
            Route::get("/decline-work/{id}", [CompetitionController::class, 'declineWork'])->name('decline.work');
            Route::get("/winners/{id}", [CompetitionController::class, 'winners'])->name('winners');
            Route::get("/change-work-status/{id}/{status}", [CompetitionController::class, 'changeWorkStatus']);
            Route::get("/declare-position/{id}/{position}/{contestId}", [CompetitionController::class, 'declarePosition']);
            Route::get("/get-current-user-works/{id}", [CompetitionController::class, 'getCurrentUserWorks']);
            Route::get("/get-all-works/{id}", [CompetitionController::class, 'getAllWorks']);
            Route::get("/get-declined-works/{id}", [CompetitionController::class, 'getDeclinedWorks']);
            Route::get("/sort-works/{id}", [CompetitionController::class, 'sortWorks']);
        });
    });
});
Route::group(['middleware' => ['auth', 'role:Customer', 'verified-user']], function () {

    //Customer
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get("/", [CustomerController::class, 'index'])->name('view');

        //Contest
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
