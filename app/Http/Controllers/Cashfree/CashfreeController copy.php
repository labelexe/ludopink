<?php

namespace App\Http\Controllers\Cashfree;

use App\Http\Controllers\Controller;
use App\Models\Transaction\Transaction;
use LoveyCom\CashFree\PaymentGateway\Order;
use App\Models\Player\Userdata;
use App\Models\Withdraw\Withdraw;
use Illuminate\Http\Request;

class CashfreeController extends Controller
{
    public function Cashfree(Request $request){
        $order = new Order();
        $od["orderId"] = "Webplustech".mt_rand(10000000,99999999);
        $od["orderAmount"] =  $request->amount;
        $od["orderNote"] = $request->Player_ID;
        $od["customerPhone"] = "9999999999";
        $od["customerName"] = $request->name;
        $od["customerEmail"] = $request->email;
        $od["returnUrl"] = url('cashfree/payment/success');
        $od["notifyUrl"] = url('/cashfree/payment');
        //call the create method
        $order->create($od);
        //get the payment link of this order for your customer
        $link = $order->getLink($od['orderId']);
       // print_r($link);

        return redirect($link->paymentLink);
    }


     public function PaymentSuccess(Request $request){

     //   print_r($request->all());
        $order = new Order();
        $orderData = $request->all();
        $orderId = $orderData["orderId"];

        $orderDetails = $order->getDetails($orderId);
        $userID = $orderDetails->details->orderNote;
        $AddAmount = floor($orderDetails->details->orderAmount);

        if($request->txStatus == "SUCCESS"){
            $insertTrans = Transaction::insert([
                "userid" => $userID,
                "order_id" =>$request->orderId,
                "txn_id" => $request->referenceId,
                "amount" => $AddAmount,
                "status" => "Success",
                "trans_date" => date("l jS F Y h:i:s A"),
                "created_at" => now(),
            ]);

        if($insertTrans){
          $userData = Userdata::where("playerid",$userID)->first();
          $prevAmount = $userData['totalcoin'];
              $purchaseAmount =  $AddAmount;
              $totalAmount = $prevAmount+$purchaseAmount;
              $playBalance = $totalAmount+$userData['wincoin'];

          $updateCoin = Userdata::where("playerid",$userID)->update(array(
            "totalcoin" => $totalAmount,
            "playcoin" => $playBalance,
            ));
          if($updateCoin){
                return redirect('payment/success');
          }

        }else{
            echo "Something Is Wrong";
        }
        }else{
            //failed transaction issues
            $insertTrans = Transaction::insert([
                "userid" => $userID,
                "order_id" =>$request->orderId,
                "txn_id" => $request->referenceId,
                "amount" => $AddAmount,
                "status" => "Failed",
                "trans_date" => date("l jS F Y h:i:s A"),
                "created_at" => now(),
            ]);
            if($insertTrans){
                return redirect('payment/failed');
              }else{
                return redirect('payment/failed');
              }

        }

     }


}
