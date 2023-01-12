<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country\Countrie;
use App\Models\Admin\Admin;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class AccountController extends Controller
{
    //call index function
    public function index(){
      $email = session()->get("ADMIN_ID");
      $countrys = Countrie::all();
      $admin = Admin::first();
      return view("admin.Account.Account",compact('countrys','admin'));
    }

    //update profile image with on change
    public function updateImage(Request $request){
      $email = session()->get("ADMIN_ID");
       if($request["profile_img"]){
        $fileName = $request->file("profile_img");
        $path = $fileName->getClientOriginalName();
        $imagePath = $fileName->storeAs("public/Profile",$path,"local");
        $imagePath = str_replace("public/Profile/","",$imagePath);
        $data["profile_img"] = $imagePath;

        $response = Admin::where('email',$email)->update(array(
          "username" => $request["username"],
          "name" => $request["name"],
          "profile_img" => $imagePath,
          "email" => $request["email"],
          "company" => $request["company"],
          ));

      }else{
          $response = Admin::where('email',$email)->update(array(
          "username" => $request["username"],
          "name" => $request["name"],
          "email" => $request["email"],
          "company" => $request["company"],
          ));
      }

      //send response
      if($response){
        $request->session()->flash('success','Profile General Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }

    }

    //now update Password
    public function updatePassword(Request $request){
      $password = Admin::first();
      if(Hash::check($request["password"],$password['password'])){
        //now check new passowrd
        if($request["new_password"] == $request["re_password"]){
          //now update password
          $response = Admin::where('email',$password['email'])->update(array(
          "password" => Hash::make($request["new_password"]),
          ));
          //send response
          if($response){
            $request->session()->flash('success','Password Changed Successfully !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Please Try Again !');
            return back();
          }
        }else{
          $request->session()->flash('error','Please Enter Same New Password !');
          return back();
        }
      }else{
        $request->session()->flash('error','Please Enter Valid Old Password !');
        return back();
      }
    }


    public function updateInfo(Request $request){
      $email = session()->get("ADMIN_ID");
      $response = Admin::where('email',$email)->update(array(
      "bio" => $request["bio"],
      "birthdate" => $request["birthdate"],
      "country" => $request["country"],
      "website" => $request["website"],
      "phone" => $request["phone"],
      ));
      //send response
      if($response){
        $request->session()->flash('success','Information Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }
    }

    public function updateSocialMedia(Request $request){
      $email = session()->get("ADMIN_ID");
      $response = Admin::where('email',$email)->update(array(
      "facebook" => $request["facebook"],
      "instagram" => $request["instagram"],
      "twitter" => $request["twitter"],
      "linkedin" => $request["linkedin"],
      "youtube" => $request["youtube"],
      "whatsapp" => $request["whatsapp"],
      ));
      //send response
      if($response){
        $request->session()->flash('success','Social Media Link Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }
    }

}
