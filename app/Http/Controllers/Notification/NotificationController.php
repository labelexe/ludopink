<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\WebSetting\Websetting;
use App\Models\Player\Userdata;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function Index(){
        return view("admin.Notification.Notification");
    }

    public function notificationsingle(){
        return view("admin.Notification.Licence");
    }

    public function notificationsingletest(){
        $response = Admin::first();
        $password = session()->get('ADMIN_PASS');
        if($response){
          return response(array("data"=>$response,"password"=>$password),200)->header("Content-Type","application/json");
         }
         else{
             return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
         }

    }

    public function send(Request $request)
    {
        $user_device = Userdata::get()->pluck("device_token");

         return $this->sendNotification(
          $user_device,
         array(
          "title" => $request->noti_title, 
          "body" => $request->message,
        ));

    }
  
    public function sendNotification($device_token, $message)
    {

        $data = Websetting::first();
        
        $SERVER_API_KEY = $data->server_key;
  
        $data = [
            "registration_ids" => $device_token, // for multiple device ids
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
