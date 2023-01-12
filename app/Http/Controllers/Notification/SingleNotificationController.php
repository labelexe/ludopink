<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\WebSetting\Websetting;
use App\Models\Player\Userdata;
use Illuminate\Http\Request;

class SingleNotificationController extends Controller
{
     
    public function send(Request $request)
    {
        $user_device = Userdata::where('userid',$request->userID)->first();

        return $this->sendNotification($user_device->device_token, array(
          "title" => $request->noti_title, 
          "body" => $request->message,
        ));

    }
  
    public function sendNotification($device_token, $message)
    {

        $data = Websetting::where('_id','60bed6aef3c80e44a06e01f0')->first();
        
        $SERVER_API_KEY = $data->server_key;

        $data = [
            "to" => $device_token, // for single device id
            "data" => $message
        ];

        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
      
        curl_close($ch);
      
       // return $response;

        if($response){
            return redirect()->back()->with('success','Notification Successfully Sent !'); 
        }else{
            return redirect()->back()->with('error','Something Is Wrong Please Try Again !'); 
        }
    }
}
