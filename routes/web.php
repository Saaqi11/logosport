<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DesignerWorkController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SupportController;
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
Route::get("/forget-password", [UserController::class, 'forgetPassword'])->name("user.forget-password");
Route::get("/reset-password/{email}", [UserController::class, 'resetPassword'])->name("user.resetPassword");
Route::post("/do-forget-password", [UserController::class, 'doforgetPassword'])->name("user.doforgetPassword");
Route::post("/do-reset-password", [UserController::class, 'doResetPassword'])->name("user.doResetPassword");

Route::get("get-city/{id}", [UserController::class, 'getCities']);
Route::get("states-city/{id}", [UserController::class, 'getStates']);


Route::get("profile/{user}/designer-works/{position}", [DesignerWorkController::class, 'designerWork'])->name('designer-works');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/send-email-verification', [UserController::class, 'reSendVerificationEmail'])->name("send-email-verification")
        ->middleware('throttle:1,1');
    Route::post('/verify-email', [UserController::class, 'verifyEmail'])->name('verify-email');
    Route::get('/verify-user', [UserController::class, 'verifyUser'])->name('verify-user');
    Route::get('/contest-listing', [ContestController::class, 'contestListing'])->name('contest.listing');
    Route::get("/user-logout", [UserController::class, 'logout'])->name("user.logout");

   
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
                Route::get("/my-active-works", [DesignerWorkController::class, 'myActiveWorks'])->name("my-active-works");
                Route::get("/my-winner-works", [DesignerWorkController::class, 'myWinnerWorks'])->name("my-winner-works");
                Route::get("/my-finish-works", [DesignerWorkController::class, 'myFinishWorks'])->name("my-finish-works");
                // designer work by id
            });
        });

        //Competition
        Route::prefix('competition')->name('competition.')->group(function () {
            Route::get("/get-winner-works/{id}", [CompetitionController::class, 'getWinnerWorks'])->name('show');
            Route::get("/show-contest-brief/{id}", [CompetitionController::class, 'showBrief'])->name('show');
            Route::get("/round-one/{id}", [CompetitionController::class, 'roundOne'])->name('round.one');
            Route::get("/designer-works/{id}", [CompetitionController::class, 'roundTwo'])->name('designer.works');
            Route::post("/save-work/{id}", [CompetitionController::class, 'saveWork'])->name('save.work');
            Route::get("/save-customer-favourite-work/{id}/{status}", [CompetitionController::class, 'saveCustomerFavouriteWork'])->name('save.customer.favourite.work');
            Route::get("/decline-work/{id}", [CompetitionController::class, 'declineWork'])->name('decline.work');
            Route::get("/winners/{id}", [CompetitionController::class, 'winners'])->name('winners');
            Route::get("/change-work-status/{id}/{status}", [CompetitionController::class, 'changeWorkStatus']);
            Route::get("/declare-position/{id}/{position}/{contestId}", [CompetitionController::class, 'declarePosition']);
            Route::get("/get-current-user-works/{id}", [CompetitionController::class, 'getCurrentUserWorks']);
            Route::get("/get-all-works/{id}", [CompetitionController::class, 'getAllWorks']);
            Route::get("/get-declined-works/{id}", [CompetitionController::class, 'getDeclinedWorks']);
            Route::get("/sort-works/{id}", [CompetitionController::class, 'sortWorks']);
            Route::get("/work-reaction/{designerId}/{workId}", [CompetitionController::class, 'workReaction'])->name('reaction.work');
            Route::delete("/delete-work-file/{id}", [CompetitionController::class, 'deleteWork'])->name('delete-file.work');
            Route::post("/update-work/{id}", [CompetitionController::class, 'updateWork'])->name('update.work');
            Route::get("/upload-work/{id}", [CompetitionController::class, 'getUploadWorks'])->name('get-upload.work');
            Route::post("/upload-work", [CompetitionController::class, 'uploadWorks'])->name('upload.work');
            Route::get('/download-file/{folder}/{id}/{name}', [CompetitionController::class, 'download'])->name('download.file');
            Route::post("/send-request", [CompetitionController::class, 'sendRequest'])->name('send-request.work');
            Route::get("/distribute-reward/{id}", [CompetitionController::class, 'distributeReward'])->name('distribute-reward.work');



        });
        Route::prefix('contest')->name('contest.')->group(function () {
            Route::get("/participate/{contest_id}", [ContestController::class, 'contestParticipate'])->name('participate');
            Route::get("/favourite/{contest_id}/{status}", [ContestController::class, 'favouriteContest'])->name('favourite');
        });


        Route::group(['middleware' => ['role:Customer', 'verified-user']], function () {

            //Customer
            Route::prefix('customer')->name('customer.')->group(function () {
                Route::get("/", [CustomerController::class, 'index'])->name('view');

                //Contest
                Route::prefix('contest')->name('contest.')->group(function () {
                    Route::get("/", [ContestController::class, 'index'])->name('view');
                    Route::get("/active", [ContestController::class, 'active'])->name('active');
                    Route::get("/finished", [ContestController::class, 'finished'])->name('finished');
                    Route::get("/cancelled", [ContestController::class, 'cancelled'])->name('cancelled');
                    Route::get("/price/{id?}", [ContestController::class, 'price'])->name('price');
                    Route::post("/price-save/{id?}", [ContestController::class, 'priceSave'])->name('price.save');
                    Route::group(['middleware' => 'contest'], function () {
                        Route::get("/cancel/{id}", [ContestController::class, 'cancel'])->name('cancel');
                        Route::get("/promote/{id}", [ContestController::class, 'promote'])->name('promote');
                        Route::prefix('payment')->name('payment.')->group(function () {
                            Route::get("/paypal-checkout/{id}", [PaymentController::class, 'paypalCheckout'])->name('paypal-checkout');
                            Route::get('/payment-success/{data}', [PaymentController::class, 'paypalSuccess'])->name('paypal-success');
                            Route::get('/payment-error/{data}', [PaymentController::class, 'paymentError'])->name('payment-error');
                        });
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

                        Route::get("/invitaion/{contestId}/{userId}", [ChatController::class, 'invitaion'])->name('invitation.save');
                    });
                });
            });
        });


        Route::prefix('chat')->name('chat.')->group(function () {
            Route::get('/', [ChatController::class, 'getChatRooms'])->name('list');
            Route::post('/', [ChatController::class, 'sendMessage'])->name('save');
            Route::get("/count", [ChatController::class, 'messageCount'])->name('count');
            Route::get('/{conversationId}', [ChatController::class, 'getMessages'])->name('message');
            Route::get('/read/{conversationId}', [ChatController::class, 'readMessage'])->name('read');
            
            Route::get("/accept-invitation/{id}", [ChatController::class, 'acceptInvitaion'])->name('invitation.accept');
            Route::get("/cancel-invitation/{id}", [ChatController::class, 'cancelInvitaion'])->name('invitation.cancel');

            Route::get("/start/{contestId}/{designerId}/{userId}", [ChatController::class, 'checkConverstaion'])->name('checkConverstaion');

        });

        //wallet
        Route::get("/wallet/count", [PaymentController::class, 'walletCount'])->name('wallet.count');

        Route::get('/wallet', [PaymentController::class, 'walletIndex'])->name('wallet.index');
        Route::post('/withdraw-request', [PaymentController::class, 'withdrawRequest'])->name('withdraw.request');
        Route::get('/withdraw-request', [PaymentController::class, 'withdrawRequestList'])->name('withdraw-list.request');
    });
    
    
    Route::get('/notification/{id}', [CustomerController::class, 'notifcation'])->name('notification.get');
    Route::get('/notification/all/{id}', [CustomerController::class, 'allNotification'])->name('notification.all');

    
    Route::get('/contact-us', function () {
        return view('support');
    })->name('support');

    Route::post('/support/submit', [SupportController::class, 'submitForm'])->name('submit.support');
});

Route::post("/customer/payment/responseurl", [PaymentController::class, 'responseCloudIpsp'])->name('response-cloudipsp')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/', function () {
    return view('index');
})->name("home");

Route::get('/terms-and-condition', function () {
    return view('footer.terms_and_condition');
})->name("terms");

Route::get('/about', function () {
    return view('footer.about');
})->name("about");

Route::get('/press', function () {
    return view('footer.press');
})->name("press");

Route::get('/faq', function () {
    return view('footer.faq');
})->name("faq");

Route::get("/works", [CustomerController::class, 'getWorks'])->name('get.works');
Route::get("/designers", [CustomerController::class, 'getDesignerWorks'])->name('get.designers');