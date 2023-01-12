<?php

namespace App\Http\Controllers\Addcoin;

use App\Http\Controllers\Controller;
use App\Models\AddCoin\Addcoin;
use App\Models\Player\Userdata;
use App\Models\Transaction\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AddCoinController extends Controller
{
    //PendingStatus coin data
    public function PendingStatus(Request $request){
        $data = Addcoin::where("status","0")->latest()->paginate(10);
        return view("admin.AddCoin.PendingAddCoinRequest", compact('data'));
    }

    public function ApprovedStatus(Request $request){
        $data = Addcoin::where("status","1")->latest()->paginate(10);
        return view("admin.AddCoin.ApprovedAddCoinRequest", compact('data'));
    }

    public function RejectStatus(Request $request){
        $data = Addcoin::where("status","2")->latest()->paginate(10);
        return view("admin.AddCoin.RejectAddCoinRequest", compact('data'));
    }

    public function ApprovedRequest($id){
        $data = Addcoin::where('id', $id)->first();
        //now update his data
        $userData = Userdata::where("playerid",$data['playerid'])->first();
        $prevAmount = $userData['totalcoin'];
        $purchaseAmount =  $data['coin'];
        $totalAmount = $prevAmount+$purchaseAmount;
        $playBalance = $totalAmount+$userData['wincoin'];

         $updateCoin = Userdata::where("playerid",$data['playerid'])->update(array(
          "totalcoin" => $totalAmount,
          "playcoin" => $playBalance,
          ));

          if ($updateCoin) {
           $updateStatus = Addcoin::where('id', $id)->update(array(
            "status" => "1",
          ));
          if($updateStatus){
            $insert = Transaction::insert([
                'userid' => $data['playerid'],
                "order_id" => "NaN",
                "txn_id" => "NaN",
                "amount" => $data['coin'],
                "status" => "Success",
                "trans_date" => date("l jS F Y h:i:s A"),
                "created_at" => Carbon::now(),
            ]);
            if ($insert) {
                return response(array("notice" => "Data Delete Success"), 200)->header("Content-Type", "application/json");
            } else {
                return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
            }

          }else{
            return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
          }


        } else {
            return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
        }

    }

    // RejectdRequest function

    public function RejectdRequest($id){
        $data = Addcoin::where('id', $id)->first();
          if ($data) {
            $updateStatus = Addcoin::where('id', $id)->update(array(
            "status" => "2",
          ));
          if($updateStatus){
            $insert = Transaction::insert([
                'userid' => $data['playerid'],
                "order_id" => "NaN",
                "txn_id" => "NaN",
                "amount" => $data['coin'],
                "status" => "Failed",
                "trans_date" => date("l jS F Y h:i:s A"),
                "created_at" => Carbon::now(),
            ]);
            if ($insert) {
                return response(array("notice" => "Data Delete Success"), 200)->header("Content-Type", "application/json");
            } else {
                return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
            }

          }else{
            return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
          }


        } else {
            return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
        }

    }
}
