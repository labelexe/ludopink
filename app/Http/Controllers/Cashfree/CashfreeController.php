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
       
		$amount = (double)$request->amount; // string to double
		$amount_in_paisa = $amount * 100; //convert to paisa
		$user_id = $request->Player_ID;

		define('merchantId', 'PGTESTPAYUAT');
		define('redirectUrl',  url('cashfree/payment/success'));
		define('callbackUrl', url('/cashfree/payment'));
		define('mobileNumber', '9068145151');
		define('apiEndpoint', '/pg/v1/pay');
		define('saltKey', '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399');
		define('saltIndex', '1');
		define('payApiUrl', 'https://api-preprod.phonepe.com/apis/hermes/pg/v1/pay');

		$merchantTransactionId = 'MTID' . $user_id . date("Ymdhis");

		$data = [
			"merchantId" => merchantId,
			"merchantTransactionId" => $merchantTransactionId,
			"merchantUserId" => $user_id,
			"amount" => $amount_in_paisa,
			"redirectUrl" => redirectUrl,
			"redirectMode" => "POST",
			"callbackUrl" => callbackUrl,
			"mobileNumber" => mobileNumber,
			"paymentInstrument" => [
				"type" => "PAY_PAGE"
			]
		];

		$body = base64_encode(json_encode($data));

		$raw = $body . apiEndpoint . saltKey;


		$XVERIFY = hash('sha256', $raw) . "###" . saltIndex;

		$client = new \GuzzleHttp\Client();
		$response = $client->request('POST', payApiUrl, [
			'body' => '{"request":"' . $body . '"}',
			'headers' => [
				'Content-Type' => 'application/json',
				'X-VERIFY' => $XVERIFY,
				'accept' => 'application/json',
			],
		]);

		$result = json_decode($response->getBody(), true);

		//print_r($result);
		//$rawResponse = json_encode($result);
		if ($result['success'] == 1) {

            $insertTrans = Transaction::insert([
                "userid" => $user_id,
                "order_id" =>$merchantTransactionId,
                "txn_id" => '',
                "amount" => $amount,
                "status" => "Initiated",
                "trans_date" => date("l jS F Y h:i:s A"),
                "created_at" => now(),
            ]);

            
			$url = $result['data']['instrumentResponse']['redirectInfo']['url'];
			header("Location: $url");
			die();
		} else {
			echo $result['message'];
		}
    }


     public function PaymentSuccess(Request $request){

        print_r($request->all()); 
        $code = $request->code;
		    $AddAmount = floor($request->amount / 100);
        $order_id = $request->transactionId; 
        $providerReferenceId = $request->providerReferenceId; 
        $transactionData = Transaction::where("order_id",$order_id)->first();
        $userID = $transactionData['userid'];
      
        if($code == "PAYMENT_SUCCESS"){
            $insertTrans = Transaction::where("order_id",$order_id)->update([
                "txn_id" => $providerReferenceId,
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
            $insertTrans = Transaction::where("order_id",$order_id)->update([
                "txn_id" => '',
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
/*
Array ( [code] => PAYMENT_ERROR [merchantId] => PGTESTPAYUAT [transactionId] => MTID839437644220230112020515 [amount] => 100 [param1] => na [param2] => na [param3] => na [param4] => na [param5] => na [param6] => na [param7] => na [param8] => na [param9] => na [param10] => na [param11] => na [param12] => na [param13] => na [param14] => na [param15] => na [param16] => na [param17] => na [param18] => na [param19] => na [param20] => na [checksum] => eb4b7ba07a93aaa3708b67f63f0553e463e79f34272e3b001226b0d910f36a5b###1 )

*/
