<?php

namespace App\Http\Controllers\Kyc;

use App\Http\Controllers\Controller;
use App\Models\Kyc\Kycdetail;
use App\Models\Withdraw\Withdraw;
use App\Models\Player\Userdata;
use App\Models\Transaction\Transaction;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KycController extends Controller
{
    //show pending kyc

    public function PendingKYC(){
        $data = Kycdetail::latest()->where('verification_status','0')->paginate(10);
        return view('admin.Kyc.AllKyc',compact('data'));
    }

     //show Approved kyc

    public function ApprovedKYC(){
        $data = Kycdetail::latest()->where('verification_status','1')->paginate(10);
        return view('admin.Kyc.ApprovedKyc',compact('data'));
    }

    //show Rejected kyc

    public function RejectedKYC(){
        $data = Kycdetail::latest()->where('verification_status','2')->paginate(10);
        return view('admin.Kyc.RejectedKyc',compact('data'));
    }


    //show pending withdraw request

    public function NewWithdrawRequest(){
        $data = Withdraw::latest()->where('status','0')->paginate(10);

       return view('admin.Withdraw.PendingWithdraw',compact('data'));
    }

     //show Approved withdraw request

    public function ApprovedWithdrawRequest(){
        $data = Withdraw::latest()->where('status','1')->paginate(10);
        return view('admin.Withdraw.ApprovedWithdraw',compact('data'));
    }

    //show Rejected withdraw request

    public function RejectedWithdrawRequest(){
        $data = Withdraw::latest()->where('status','2')->paginate(10);
        return view('admin.Withdraw.RejectedWithdraw',compact('data'));
    }

    //view kyc details

    public function ViewKycDetails($id){
        $kycdata = Kycdetail::where('_id',Crypt::decrypt($id))->first();
        $userdata = Userdata::where('userid',$kycdata->userid)->first();
        $data = Withdraw::where('userid',$kycdata->userid)->latest()->paginate(10);
        $playerName = Userdata::where('userid',$kycdata->userid)->first();
        return view('admin.Kyc.KycDetails',compact('kycdata','userdata','data','playerName'));
    }

    public function VerifyKycStatus(Request $request){
        $response = Kycdetail::where("_id",$request->id)->update(array(
            "verification_status" => "1",
            ));
        if($response){
            $userverify = Userdata::where("userid",$request->userid)->update(array(
            "kyc_status" => "1",
            ));

            if($userverify){
            $request->session()->flash('success','User Kyc Successfully Verified !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }

        }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }

    }


    public function RejectKycStatus(Request $request){
        $response = Kycdetail::where("_id",$request->id)->update(array(
            "verification_status" => "2",
            ));
        if($response){
            $userverify = Userdata::where("userid",$request->userid)->update(array(
            "kyc_status" => "2",
            ));

            if($userverify){
            $request->session()->flash('success','User Kyc Successfully Rejected !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }

        }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }

    }

    public function PendingKycStatus(Request $request){
        $response = Kycdetail::where("_id",$request->id)->update(array(
            "verification_status" => "0",
            ));
        if($response){
            $userverify = Userdata::where("userid",$request->userid)->update(array(
            "kyc_status" => "0",
            ));

            if($userverify){
            $request->session()->flash('success','User Kyc Successfully In Pending !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }

        }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }

    }


    public function AllTransaction(){
        $data = Transaction::latest()->paginate(10);
       return view('admin.Transaction.AllTransaction',compact('data'));
    }

    public function AllSuccessTransaction(){
        $data = Transaction::latest()->where('status','Success')->paginate(10);
        return view('admin.Transaction.SuccessTransaction',compact('data'));
    }

    public function AllFailTransaction(){
        $data = Transaction::latest()->where('status','Failed')->paginate(10);
        return view('admin.Transaction.FailedTransaction',compact('data'));
    }
}
