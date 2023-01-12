<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Models\Player\Userdata;
use App\Models\Withdraw\Withdraw;
use App\Models\Transaction\Transaction;
use App\Models\Gamehistory\Gamehistorie;
use App\Models\WebSetting\Websetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function AllPlayer(){
        $data = Userdata::latest()->paginate(10);
        return view('admin.Player.AllPlayer',compact('data'));
    }

    public function BlockPlayer(){
        $data = Userdata::where('banned',0)->latest()->paginate(10);
        return view('admin.Player.BlockedPlayer',compact('data'));
    }

    //view player details

    public function ViewPlayerDetails($id){
        $data = Userdata::where('playerid',Crypt::decrypt($id))->first();
        $TotalRefer =  Withdraw::where("userid",Crypt::decrypt($id))->where("userid",Crypt::decrypt($id))->count();
        $NoOfWithdraw =  Withdraw::where("userid",Crypt::decrypt($id))->count();
        $withdrawAmount = Withdraw::where("status","1")->where("userid",Crypt::decrypt($id))->sum('amount');
        $TotalTrans = Transaction::where("userid",Crypt::decrypt($id))->count();
        $TotalSuccessTrans = Transaction::where("status","Success")->where("userid",Crypt::decrypt($id))->count();
        $Websetting = Websetting::first();
        $TotalFailedTrans = Transaction::where("status","Failed")->where("userid",Crypt::decrypt($id))->count();
        return view('admin.Player.PlayerDetails',compact('data','NoOfWithdraw','withdrawAmount','TotalTrans','TotalSuccessTrans','TotalFailedTrans','Websetting'));

    }


    public function AddCoin(Request $request){
        $UserData = Userdata::where('playerid',$request->PlayerID)->first();
        $prevcoin = $UserData->totalcoin;
        $prevwincoin = $UserData->wincoin;
        $TotalCoin = $prevcoin+$request->CoinValue;
        $TotalWinCoin = $prevwincoin+$request->WinValue;
        $response = Userdata::where("playerid",$request->PlayerID)->update(array(
            "totalcoin" => $TotalCoin,
            "wincoin" => $TotalWinCoin,
            ));

        //send response
          if($response){
            $request->session()->flash('success','Coin Added Successfully !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }

    }

     public function CutUserCoin(Request $request){
        $UserData = Userdata::where('playerid',$request->PlayerID)->first();
        $prevcoin = $UserData->totalcoin;
        $prevwincoin = $UserData->wincoin;
        $TotalCoin = $prevcoin-$request->CoinValue;
        $TotalWinCoin = $prevwincoin-$request->WinValue;
        $response = Userdata::where("playerid",$request->PlayerID)->update(array(
            "totalcoin" => $TotalCoin,
            "wincoin" => $TotalWinCoin,
            ));

        //send response
          if($response){
            $request->session()->flash('success','Coin Deduct Successfully !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }

    }

     public function UpdateUserDetails(Request $request){
        $response = Userdata::where("userid",$request->PlayerID)->update(array(
            "username" => $request->PlayerName,
            "userphone" => $request->PlayerPhone,
            "useremail" => $request->PlayerEmail,
            "points" => $request->TotalCoin,
            "winning_amount" => $request->TotalWinCoin,
            "kyc_status" => $request->KycStatus,
            ));

        //send response
          if($response){
            $request->session()->flash('success','User Data Updated Successfully !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }

    }

     public function UserBan(Request $request, $id){
        $response = Userdata::where("userid",$id)->update(array(
            "banned" => "0",
            ));
         if($response){
          return response(array("data"=>$response),200)->header("Content-Type","application/json");
         }
         else{
             return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
         }

    }

      public function UserUnBan(Request $request, $id){
        $response = Userdata::where("userid",$id)->update(array(
            "banned" => "1",
            ));
         if($response){
          return response(array("data"=>$response),200)->header("Content-Type","application/json");
         }
         else{
             return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
         }

    }

    //show transaction history

    public function TransctionHistory($id){
        $UserData = Userdata::where('playerid',Crypt::decrypt($id))->first();
        $data = Transaction::where('userid',Crypt::decrypt($id))->latest()->paginate(10);
        return view('admin.Player.TransactionHistory',compact('data','UserData'));
    }

    public function WithdrawHistory($id){
        $UserData = Userdata::where('playerid',Crypt::decrypt($id))->first();
        $data = Withdraw::where('userid',Crypt::decrypt($id))->latest()->paginate(10);
        return view('admin.Player.WithdrawHistory',compact('data','UserData'));
    }

     public function GameHistory($id){
        $UserData = Userdata::where('playerid',Crypt::decrypt($id))->first();
        $data = Gamehistorie::where('playerid',Crypt::decrypt($id))->latest()->paginate(10);
        return view('admin.Player.GameHistory',compact('data','UserData'));
    }

     public function ReferdUser($id){
        $UserData = Userdata::where('playerid',Crypt::decrypt($id))->first();
        $data = Userdata::where('used_refer_code',$UserData->referral_code)->latest()->paginate(10);
        return view('admin.Player.ReferdUser',compact('data','UserData'));
    }

    //now update withdraw status

    public function UpdateWithdrawStatus(Request $request){
        $response = Withdraw::where("id",$request->RequestID)->update(array(
            "status" => $request->status,
            "transaction_id" => $request->transaction_id,
            ));

       // send response
          if($response){
            $request->session()->flash('success','Withdraw Status Updated Successfully !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }
    }

      public function DeletePlayer($id){
        $response = Userdata::find($id);
        $response = $response->delete();
        if($response){
          return response(array("notice"=>"Data Delete Success"),200)->header("Content-Type","application/json");
         }
         else{
             return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
         }

      }

      public function UpdateUserdata(){
        $response = Userdata::truncate();
        if($response){
            return redirect('/admin/dashboard');
           }
           else{
            return redirect('/admin/dashboard');
           }
      }
      //now search player

      public function SearchPlayer(Request $request){
        $search = $request->searchInput;
        $data = Userdata::where('playerid', 'LIKE', "%{$search}%")->orWhere('useremail', 'LIKE', "%{$search}%")->latest()->paginate(10);
      return view('admin.Player.search',compact('data'));

     }

}
