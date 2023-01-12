<?php

namespace App\Http\Controllers\Api\Player;

use App\Http\Controllers\Controller;
use App\Models\Player\Userdata;
use App\Models\Bidvalue\Bid;
use Illuminate\Http\File;
use App\Models\WebSetting\Websetting;
use App\Models\Shopcoin\Shopcoin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //for google login
    public function CreatePlayer(Request $request)
    {
        $gameConfig = Websetting::first();
        $randomNumber = random_int(100000, 999999);
        $playerid = mt_rand(1000000000, 9999999999);;

        //check google login
        $checkGooglePrevAccount = Userdata::where('useremail', $request->email)->first();
        if ($checkGooglePrevAccount != "") {
            $response = ['notice' => 'User Already Exists !', 'playerid' => $checkGooglePrevAccount['playerid']];
            return response($response, 200);
        } else {
            $insert = Userdata::insert([
                'playerid' => $playerid,
                "username" => $request->first_name,
                "password" => Hash::make($request->password),
                "useremail" => $request->email,
                "refer_code" => $randomNumber,
                "totalcoin" => $gameConfig->signup_bonus,
                "wincoin" => "0",
                "registerDate" => date("l jS F Y h:i:s A"),
                "device_token" => $request->device_token,
                "status" => 1,
                "banned" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);

            if ($insert) {
                $response = ['notice' => 'User Successfully Created !', 'playerid' => $playerid];
                return response($response, 200);
            } else {
                return response(array("notice" => "Opps Something Is Wrong !"), 200)->header("Content-Type", "application/json");
            }
        }
    }

    //for facebook login

    public function FacebookSignup(Request $request)
    {
        $gameConfig = Websetting::first();
        $randomNumber = random_int(100000, 999999);
        $playerid = floor(time() - 999999999);

        //check google login

        $checkGooglePrevAccount = Userdata::where('useremail', $request->email)->first();
        if ($checkGooglePrevAccount != "") {
            $response = ['notice' => 'User Already Exists !', 'playerid' => $checkGooglePrevAccount['playerid']];
            return response($response, 200);
        } else {
            $insert = Userdata::insert([
                'playerid' => $playerid,
                "username" => $request->first_name,
                "password" => Hash::make($request->password),
                "useremail" => $request->email,
                "refer_code" => $randomNumber,
                "totalcoin" => $gameConfig->signup_bonus,
                "wincoin" => "0",
                "registerDate" => date("l jS F Y h:i:s A"),
                "device_token" => $request->device_token,
                "status" => 1,
                "banned" => 1,
            ]);

            if ($insert) {
                $response = ['notice' => 'User Successfully Created !', 'playerid' => $playerid];
                return response($response, 200);
            } else {
                return response(array("notice" => "Opps Something Is Wrong !"), 200)->header("Content-Type", "application/json");
            }
        }
    }

    public function PlayerDeatils(Request $request)
    {
        $PlayerCoin = Userdata::where('playerid', $request->playerid)->first();
        $UpdateCoin = $PlayerCoin['totalcoin'] + $PlayerCoin['wincoin'];
        $UpdateData = Userdata::where('playerid', $request->playerid)->update([
            "playcoin" => $UpdateCoin,
        ]);
        if ($UpdateData) {
            $userdata = Userdata::where('playerid', $request->playerid)->first();
        } else {
            $response = ["message" => 'Something Is Wrong'];
            return response($response, 200);
        }

        $bid = Bid::get();
        $shopcoin = Shopcoin::get();
        $gameConfig = Websetting::first();

        $response = ["message" => 'All Details Fetched Successfully', 'playerdata' => $userdata, 'bidvalues' => $bid, 'gameconfig' => $gameConfig, 'shop_coin' => $shopcoin];
        return response($response, 200);

        //   $response = ["message" =>'All Details Fetched Successfully','playerdata' => $userdata,'bidvalues'=>$bid,'gameconfig'=>$gameConfig];
        //   return response($response, 200);
    }

    public function PlayerProfileIMGUpdate(Request $request)
    {

        if ($request->profile_img) {
            $fileName = $request->file("profile_img");
            $path = $fileName->getClientOriginalName();
            $imagePath = $fileName->storeAs("public/Profile", $path, "local");
            $imagePath = str_replace("public/Profile", "", $imagePath);
            $data["profile_img"] = $imagePath;

            $response = Userdata::where('playerid', $request->playerid)->update(array(
                "photo" => $imagePath,
            ));

            if ($response) {
                $response = ['notice' => 'Image Updated'];
                return response($response, 200);
            } else {
                $response = ['notice' => 'Image Not Updated'];
                return response($response, 200);
            }
        } else {
            $response = ['notice' => 'Image Not Received'];
            return response($response, 200);
        }
    }
}
