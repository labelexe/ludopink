<?php

use Illuminate\Http\Request;
use App\Http\Controllers\RestApi\PaymentGateway\Razorpay\RazorpayController;
use App\Http\Controllers\PaymentGateway\Razorpay\GemRazorpay;
use App\Http\Controllers\Api\Player\PlayerController;
use App\Http\Controllers\Api\Player\GameManagerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//player data routing
Route::post('/register',[PlayerController::class,'CreatePlayer']);

Route::post('/facebook/register',[PlayerController::class,'FacebookSignup']);

Route::post('/verify/user',[PlayerController::class,'VerifyUser']);

Route::post('/login',[PlayerController::class,'loginPlayer']);

Route::post('/player/details',[PlayerController::class,'PlayerDeatils']);

Route::post('/player/profile/image/update',[PlayerController::class,'PlayerProfileIMGUpdate']);

Route::post('/join/game',[GameManagerController::class,'JoinGame']);

Route::post('/gameplay/status',[GameManagerController::class,'GameStatus']);

Route::post('/player/playerhistory',[GameManagerController::class,'AddGameHistory']);

Route::post('/amount/withdraw',[GameManagerController::class,'WithdrawRequest']);

Route::post('/update/bank/account',[GameManagerController::class,'UpdateBankAccount']);

Route::post('/search/player',[GameManagerController::class,'SearchPlayer']);

Route::post('/add/friend',[GameManagerController::class,'AddFriends']);

Route::post('/accept/friend',[GameManagerController::class,'AcceptFriends']);

Route::post('/accept/friend/list',[GameManagerController::class,'AcceptFriendsList']);

Route::post('/request/friend/list',[GameManagerController::class,'RequestFriendsList']);

Route::post('/payment/history',[GameManagerController::class,'PaymentHistory']);

Route::get('/player/leaderboard',[GameManagerController::class,'Leaderboard']);

Route::post('/refer/player',[GameManagerController::class,'ReferCode']);

Route::get('/check/app/version',[GameManagerController::class,'AppVersion']);

// This route is for payment initiate page

Route::get('/razorpay/payment',[RazorpayController::class,'Initiate']);
Route::post('/razorpay/payment/complete',[RazorpayController::class,'Complete']);


