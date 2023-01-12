<?php

namespace App\Http\Controllers\Api\Player;

use App\Http\Controllers\Controller;
use App\Models\Player\Userdata;
use App\Models\WebSetting\Websetting;
use App\Models\Friends\Friend;
use App\Models\Withdraw\Withdraw;
use App\Models\Transaction\Transaction;
use App\Models\Gamehistory\Gamehistorie;
use Illuminate\Http\Request;

class GameManagerController extends Controller
{
    //cut coin
    public function JoinGame(Request $request)
    {
        $PlayerData = Userdata::where('playerid', $request->playerid)->first();
        if($PlayerData['totalcoin']>=$request->bidamount){
            $finalTotalAmount = $PlayerData['totalcoin'] - $request->bidamount;
             $UpdateCoin = Userdata::where('playerid', $request->playerid)->update(array(
            'totalcoin' => $finalTotalAmount,
        ));

        if ($UpdateCoin) {
            $response = ['notice' => 'Coin Updated', 'totalcoin' => $finalTotalAmount];
            return response($response, 200);
        } else {
            $response = ['notice' => 'Coin Not Updated', 'totalcoin' => $finalTotalAmount];
            return response($response, 200);
        }

        }else if($PlayerData['wincoin']>=$request->bidamount){

              $finalWinAmount = $PlayerData['wincoin'] - $request->bidamount;
               $UpdateCoin = Userdata::where('playerid', $request->playerid)->update(array(
               'wincoin' => $finalWinAmount,
        ));

        if ($UpdateCoin) {
            $response = ['notice' => 'Coin Updated', 'totalcoin' => $finalWinAmount];
            return response($response, 200);
        } else {
            $response = ['notice' => 'Coin Not Updated', 'totalcoin' => $finalWinAmount];
            return response($response, 200);
        }

        }else{
            $finalplayTotalAmount = $request->bidamount-$PlayerData['totalcoin'];
            $finalWinAmount = $PlayerData['wincoin'] - $finalplayTotalAmount;
            $UpdateCoin = Userdata::where('playerid', $request->playerid)->update(array(
                'wincoin' => $finalWinAmount,
                'totalcoin'=> "0",
           ));

           if ($UpdateCoin) {
            $response = ['notice' => 'Coin Updated', 'totalcoin' => $finalWinAmount];
            return response($response, 200);
          } else {
            $response = ['notice' => 'Coin Not Updated', 'totalcoin' => $finalWinAmount];
            return response($response, 200);
         }

        }

    }

    //game status

    public function GameStatus(Request $request)
    {
        if ($request->status == "win"){
            $PlayerData = Userdata::where('playerid', $request->playerid)->first();
            $finalAmount = $PlayerData['totalcoin'] + $request->entrycoin;
            $GamePlayed = $PlayerData['GamePlayed'] + 1;
            $winAmount = $PlayerData['wincoin'] + $request->winamount;

            $PlayerTotalCount = $finalAmount+$winAmount;

            if ($request->wintype == "twoplayerwin") {
                $wintype = $PlayerData['twoPlayWin'] + 1;
                $UpdateCoin = Userdata::where('playerid', $request->playerid)->update(array(
                    'wincoin' => $winAmount,
                    'totalcoin' => $finalAmount,
                    'playcoin' => $PlayerTotalCount,
                    'GamePlayed' => $GamePlayed,
                    'twoPlayWin' => $wintype,
                ));

                if ($UpdateCoin) {
                    $response = ['notice' => 'User Win Status Update','totalcoin' => $PlayerTotalCount];
                    return response($response, 200);
                } else {
                    $response = ['notice' => 'Coin Not Updated','totalcoin' => $PlayerTotalCount];
                    return response($response, 200);
                }
            } else if ($request->wintype == "fourplayerwin"){
                $wintype = $PlayerData['FourPlayWin'] + 1;
                $UpdateCoin = Userdata::where('playerid', $request->playerid)->update(array(
                    'wincoin' => $winAmount,
                    'totalcoin' => $finalAmount,
                    'GamePlayed' => $GamePlayed,
                    'FourPlayWin' => $wintype,
                ));

                if ($UpdateCoin) {
                    $response = ['notice' => 'User Win Status Update','totalcoin' => $PlayerTotalCount];
                    return response($response, 200);
                } else {
                    $response = ['notice' => 'Coin Not Updated','totalcoin' => $PlayerTotalCount];
                    return response($response, 200);
                }
            }
            if ($request->wintype == "Private") {
                $wintype = $PlayerData['twoPlayWin'] + 1;
                $UpdateCoin = Userdata::where('playerid', $request->playerid)->update(array(
                    'wincoin' => $winAmount,
                    'totalcoin' => $finalAmount,
                    'playcoin' => $PlayerTotalCount,
                    'GamePlayed' => $GamePlayed,
                    'twoPlayWin' => $wintype,
                ));

                if ($UpdateCoin) {
                    $response = ['notice' => 'User Win Status Update','totalcoin' => $PlayerTotalCount];
                    return response($response, 200);
                } else {
                    $response = ['notice' => 'Coin Not Updated','totalcoin' => $PlayerTotalCount];
                    return response($response, 200);
                }
            }
            else{
                $response = ['notice' => 'Coin Not Updated'];
                    return response($response, 200);
            }
        } else{
            $PlayerData = Userdata::where('playerid', $request->playerid)->first();
            $GamePlayed = $PlayerData['GamePlayed'] + 1;
            if ($request->wintype == "twoplayerwin"){
                $losstype = $PlayerData['twoPlayloss'] + 1;
                $UpdateCoin = Userdata::where('playerid', $request->playerid)->update(array(
                    'GamePlayed' => $GamePlayed,
                    'twoPlayloss' => $losstype,
                ));

                if ($UpdateCoin) {
                    $response = ['notice' => 'User loss Status Update'];
                    return response($response, 200);
                } else {
                    $response = ['notice' => 'Coin Not Updated'];
                    return response($response, 200);
                }
            } else {
                $losstype = $PlayerData['FourPlayloss'] + 1;
                $UpdateCoin = Userdata::where('playerid', $request->playerid)->update(array(
                    'GamePlayed' => $GamePlayed,
                    'FourPlayloss' => $losstype,
                ));

                if ($UpdateCoin) {
                    $response = ['notice' => 'User loss Status Update'];
                    return response($response, 200);
                } else {
                    $response = ['notice' => 'Coin Not Updated'];
                    return response($response, 200);
                }
            }
        }
    }

    public function WithdrawRequest(Request $request)
    {
        $PlayerData = Userdata::where('playerid', $request->playerid)->first();
        $withdrawData = Withdraw::where('userid', $request->playerid)->where('status', '0')->first();

        if ($withdrawData != "") {
            $response = ['notice' => 'Already Requested'];
            return response($response, 200);
        } else {
            if ($PlayerData['wincoin'] >= $request->requestAmount) {
                $RestWinAmount = $PlayerData['wincoin'] - $request->requestAmount;
                //now check payment method
                if ($request->withdrawmethod == "upi") {

                    //now check payment method
                    $insert = Withdraw::insert([
                        "userid" => $request->playerid,
                        'amount' => $request->requestAmount,
                        "payment_method" => "UPI",
                        "bank_name" => "..",
                        "account_number" => $request->upi_id,
                        "ifsc_code" => "..",
                        "status" => "0",
                    ]);

                    if ($insert) {
                        $playbalance = $PlayerData['totalcoin']+$RestWinAmount;

                        $UpdateTotalCoin = Userdata::where('playerid', $request->playerid)->update(array(
                            'wincoin' => $RestWinAmount,
                            'playcoin' => $playbalance,
                        ));
                        if ($UpdateTotalCoin) {
                            $remaningwincoin = Userdata::where('playerid', $request->playerid)->first();
                            $response = ['notice' => 'Final Amount Update',"wincoin"=>$remaningwincoin['wincoin']];
                            return response($response, 200);
                        } else {
                            $response = ['notice' => 'Final Amount Not Updated'];
                            return response($response, 200);
                        }
                    } else {
                        $response = ['notice' => 'Bank Details Not Inserted'];
                        return response($response, 200);
                    }
                } else if ($request->withdrawmethod == "paytm") {

                    //now check payment method
                    $insert = Withdraw::insert([
                        "userid" => $request->playerid,
                        'amount' => $request->requestAmount,
                        "payment_method" => "Paytm",
                        "bank_name" => "..",
                        "account_number" => $request->Paytm_ID,
                        "ifsc_code" => "..",
                        "status" => "0",
                    ]);

                    if ($insert) {
                        $playbalance = $PlayerData['totalcoin']+$RestWinAmount;
                        $UpdateTotalCoin = Userdata::where('playerid', $request->playerid)->update(array(
                            'wincoin' => $RestWinAmount,
                            'playcoin' => $playbalance,
                        ));
                        if ($UpdateTotalCoin) {
                            $remaningwincoin = Userdata::where('playerid', $request->playerid)->first();
                            $response = ['notice' => 'Final Amount Update',"wincoin"=>$remaningwincoin['wincoin']];
                            return response($response, 200);
                        } else {
                            $response = ['notice' => 'Final Amount Not Updated'];
                            return response($response, 200);
                        }
                    } else {
                        $response = ['notice' => 'Bank Details Not Inserted'];
                        return response($response, 200);
                    }
                } else if ($request->withdrawmethod == "bank") {

                    //now check payment method
                    $insert = Withdraw::insert([
                        "userid" => $request->playerid,
                        'amount' => $request->requestAmount,
                        "payment_method" => "Bank Account",
                        "bank_name" => $request->bank_name,
                        "account_number" => $request->account_number,
                        "ifsc_code" => $request->ifsc,
                        "status" => "0",
                    ]);

                    if ($insert) {
                        $playbalance = $PlayerData['totalcoin']+$RestWinAmount;
                        $UpdateTotalCoin = Userdata::where('playerid', $request->playerid)->update(array(
                            'wincoin' => $RestWinAmount,
                            'playcoin' => $playbalance,
                        ));
                        if ($UpdateTotalCoin) {
                            $remaningwincoin = Userdata::where('playerid', $request->playerid)->first();
                            $response = ['notice' => 'Final Amount Update',"wincoin"=>$remaningwincoin['wincoin']];
                            return response($response, 200);
                        } else {
                            $response = ['notice' => 'Final Amount Not Updated'];
                            return response($response, 200);
                        }
                    } else {
                        $response = ['notice' => 'Bank Details Not Inserted'];
                        return response($response, 200);
                    }
                }
            } else {
                $response = ['notice' => 'You Dont have Enough Coin'];
                return response($response, 200);
            }
        }
    }

    //update bank account

    public function UpdateBankAccount(Request $request)
    {
        $UpdateBank = Userdata::where('playerid', $request->playerid)->update(array(
            'accountHolder' => $request->accountHolder,
            'accountNumber' => $request->accountNumber,
            'ifsc' => $request->ifsc,
        ));
        if ($UpdateBank) {
            $response = ['notice' => 'Account NUmber Update'];
            return response($response, 200);
        } else {
            $response = ['notice' => 'Account Number Not Updated'];
            return response($response, 200);
        }
    }

    //payment history

    public function PaymentHistory(Request $request)
    {
        $withdraw = Withdraw::where('userid', $request->playerid)->get();
        $transaction = Transaction::where('userid', $request->playerid)->get();
        if ($withdraw) {
            $response = ['notice' => 'Player Withdraw & Transaction History', 'withdrawhistory' => $withdraw, 'transactionhistory' => $transaction];
            return response($response, 200);
        } else {
            $response = ['notice' => 'No Any History Found'];
            return response($response, 200);
        }
    }

    //now search player

    public function SearchPlayer(Request $request)
    {
        $searchPlayer = Userdata::where('playerid', $request->playerid)->first();
        if ($searchPlayer) {
            $response = ['notice' => 'Player Found', 'playerdata' => $searchPlayer];
            return response($response, 200);
        } else {
            $response = ['notice' => 'Player Not Found'];
            return response($response, 200);
        }
    }

    //now add game history

    public function AddGameHistory(Request $request){
        $userdata = Userdata::where('playerid', $request->playerid)->first();
        $winmoney = $request->Win_amount-$request->bid_amount;
        $finalAmount = $userdata['playcoin']+$winmoney;


        $insert = Gamehistorie::insert([
            "playerid" => $request->playerid,
            "status" => $request->status,
            "bid_amount" => $request->bid_amount,
            "Win_amount" => $request->Win_amount,
            "loss_amount" => $request->loss_amount,
            "seat_limit" => $request->seat_limit,
            "oppo1" => $request->oppo1,
            "oppo2" => $request->oppo2,
            "oppo3" => $request->oppo3,
            "playername" => $userdata['username'],
            "finalamount" => $finalAmount,
            "playtime" =>  date("l jS F Y h:i:s A"),
        ]);

        if ($insert) {
            $response = ['notice' => 'History Added'];
            return response($response, 200);
        } else {
            $response = ['notice' => 'History Not Added'];
            return response($response, 200);
        }

    }


    //now add friends

    public function AddFriends(Request $request)
    {
        $FriendsData = Userdata::where('playerid', $request->friendsid)->first();
        $insert = Friend::insert([
            "playerid" => $request->playerid,
            'friendsid' => $request->friendsid,
            "name" => $FriendsData['username'],
            "photo" => $FriendsData['photo'],
            "coin" => $FriendsData['totalcoin'],
            "status" => '0',
        ]);

        if ($insert) {
            $response = ['notice' => 'Friend Request Sent'];
            return response($response, 200);
        } else {
            $response = ['notice' => 'Friend  Request Not Sent'];
            return response($response, 200);
        }
    }

    //now accept friend

    public function AcceptFriends(Request $request)
    {
        $AcceptRequest = Friend::where('playerid', $request->playerid)->where('friendsid', $request->friendsid)->update(array(
            'status' => '1',
        ));
        if ($AcceptRequest) {
            $response = ['notice' => 'Friend Request Accepted'];
            return response($response, 200);
        } else {
            $response = ['notice' => 'Friend Request Not Accepted'];
            return response($response, 200);
        }
    }

    //now get accept friends list

    public function AcceptFriendsList(Request $request)
    {
        $AcceptFriendList = Friend::where('playerid', $request->playerid)->where('status', '1')->get();
        if ($AcceptFriendList) {
            $response = ['notice' => 'All Friend List Found', 'FriendList' => $AcceptFriendList];
            return response($response, 200);
        } else {
            $response = ['notice' => 'All Friend List Not Found'];
            return response($response, 200);
        }
    }

    //now get request friends list

    public function RequestFriendsList(Request $request)
    {
        $RequestFriendList = Friend::where('playerid', $request->playerid)->where('status', '0')->get();
        if ($RequestFriendList) {
            $response = ['notice' => 'All Request Friend List Found', 'FriendList' => $RequestFriendList];
            return response($response, 200);
        } else {
            $response = ['notice' => 'All Request Friend List Not Found'];
            return response($response, 200);
        }
    }

    public function Leaderboard(Request $request)
    {
        $userdata = Userdata::OrderBy('wincoin', 'ASC')->limit(20)->get();
        $response = ["message" => 'Leader Board Fetch Success', 'leaderboard' => $userdata];
        return response($response, 200);
    }

    //now refer player code

    public function ReferCode(Request $request)
    {
        $gameConfig = Websetting::first();
        $ReferCode = Userdata::where('refer_code', $request->refercode)->first();
        if ($ReferCode != "") {
            $userdata = Userdata::where('playerid', $request->playerid)->first();
            $refercoin = $ReferCode["refrelCoin"] + $gameConfig["refer_bonus"];
            $finalcoin = $ReferCode["totalcoin"] + $gameConfig["refer_bonus"];

            if ($userdata["used_refer_code"] == null) {
                $update = Userdata::where('playerid', $request->playerid)->update(array(
                    "used_refer_code" => $request->refercode,
                ));
                if ($update) {

                    $updatereferuser = Userdata::where('refer_code', $request->refercode)->update(array(
                        "totalcoin" => $finalcoin,
                        "refrelCoin" => $refercoin,
                    ));

                    if ($updatereferuser) {
                        $response = ['notice' => 'Refer Success'];
                        return response($response, 200);
                    } else {
                        $response = ['notice' => 'Something is wrong'];
                        return response($response, 200);
                    }
                } else {
                    $response = ['notice' => 'Refer Code Not Updated'];
                    return response($response, 200);
                }
            } else {
                $response = ['notice' => 'Refer Code Already Used'];
                return response($response, 200);
            }
        } else {
            $response = ['notice' => 'Invalid Refer Code'];
            return response($response, 200);
        }
    }

    public function AppVersion(){
       $gameConfig = Websetting::first();
       $response = ["message" =>'All Details Fetched Successfully','gameconfig'=>$gameConfig];
       return response($response, 200);
    }
}
