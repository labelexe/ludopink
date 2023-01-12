<?php

namespace App\Http\Controllers\RestApi\PaymentGateway\Razorpay;

use App\Http\Controllers\Controller;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use App\Models\WebSetting\Websetting;
use App\Models\Transaction\Transaction;
use App\Models\Player\Userdata;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RazorpayController extends Controller
{


    public function Initiate(Request $request)
    {

        $PayKey = Websetting::first();

        // Generate random receipt id
        $receiptId = Str::random(10);

        $api = new Api($PayKey->payment_apikey, $PayKey->payment_secret);

        // In razorpay you have to convert rupees into paise we multiply by 100
        // Currency will be INR
        // Creating order
        $order = $api->order->create(
            array(
                'receipt' => $receiptId,
                'amount' => $request->amount * 100,
                'currency' => 'INR'
            )
        );

        // Let's create the razorpay payment page
        $response = [
            'orderId' => $order['id'],
            'razorpayId' =>$PayKey->payment_apikey,
            'amount' => $request->amount * 100,
            'name' => $request->name,
            'currency' => 'INR',
            'email' => $request->email,
            'contactNumber' => $request->phone,
            'address' => "Dummy Text",
            'description' => 'Ludo payment',
            'userID' => $request->Player_ID,
        ];

        // Let's checkout payment page is it working
        return view('admin.Razorpay.PaymentInitate', compact('response'));
    }


    public function Complete(Request $request)
    {

        // print_r($request->all());


        // Now verify the signature is correct . We create the private function for verify the signature
        $signatureStatus = $this->SignatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid'],
            $request->all()['amount'],
            $request->all()['userid']
        );

        // If Signature status is true We will save the payment response in our database
        // In this tutorial we send the response to Success page if payment successfully made
        if ($signatureStatus == true) {

            $insertTrans = Transaction::insert([
                    "userid" => $request->all()['userid'],
                    "order_id" =>$request->all()['rzp_orderid'],
                    "txn_id" => $request->all()['rzp_paymentid'],
                    "amount" => $request->all()['amount']/100,
                    "status" => "Success",
                    "trans_date" => date("l jS F Y h:i:s A"),
                    "created_at" => now(),
                ]);

            if($insertTrans){
              $userData = Userdata::where("playerid",$request->all()['userid'])->first();
              $prevAmount = $userData['totalcoin'];
              $purchaseAmount =  $request->all()['amount']/100;
              $totalAmount = $prevAmount+$purchaseAmount;
              $playBalance = $totalAmount+$userData['wincoin'];

              $updateCoin = Userdata::where("playerid",$request->all()['userid'])->update(array(
                "totalcoin" => $totalAmount,
                "playcoin" => $playBalance,
                ));

              if($updateCoin){
                    return redirect('payment/success');
              }

            }else{
                echo "Something Is Wrong";
            }

        } else {

             $insertTrans = Transaction::insert([
                    "userid" => $request->all()['userid'],
                    "order_id" =>$request->all()['rzp_orderid'],
                    "txn_id" => $request->all()['rzp_paymentid'],
                    "amount" => $request->all()['amount']/100,
                    "status" => "Failed",
                    "trans_date" => date("l jS F Y h:i:s A"),
                    "created_at" => now(),
                ]);

             if($insertTrans){
                return redirect('payment/failed');
            }else{
              echo "Something Is Wrong";
            }


        }
    }

    // In this function we return boolean if signature is correct
    private function SignatureVerify($_signature, $_paymentId, $_orderId)
    {
        $PayKey = Websetting::first();

        try {
            $api = new Api($PayKey->payment_apikey, $PayKey->payment_secret);
            $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId,  'razorpay_order_id' => $_orderId);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Exception $e) {
            // If Signature is not correct its give a excetption so we use try catch
            return false;
        }

}
}
