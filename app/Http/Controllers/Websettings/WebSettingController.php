<?php

namespace App\Http\Controllers\Websettings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\WebSetting\Websetting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    public function index(){
    $websetting = Websetting::where('id',"1")->first();
    return view('admin.Websettings.websettings',compact('websetting'));
  }

  //now general update Settings
  public function generalUpdate(Request $request){

    $response = Websetting::where('id',"1")->update(array(
      "website_name" => $request["website_name"],
      "website_url" => $request["website_url"],
      "website_tagline" => $request["website_tagline"],
      "website_keyword" => $request["website_keyword"],
      "website_desc" => $request["website_desc"],
      "copyright" => $request["copyright"],
      "skin_mode" => $request["skin_mode"],
      "sideskin_mode" => $request["sideskin_mode"],
      ));
      //send response
      if($response){
        $request->session()->flash('success','General Settings Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }

  }

  //now logo update Settings
  public function logoUpdate(Request $request){

    if($request["head_logo"]){
      $fileName = $request->file("head_logo");
      $path = $fileName->getClientOriginalName();
      $imagePath = $fileName->storeAs("public/Brand",$path,"local");
      $imagePath = str_replace("public/Brand/","",$imagePath);
      $data["head_logo"] = $imagePath;

      $response = Websetting::where('id',"1")->update(array(
        "head_logo" => $imagePath,
        ));

    }
    if($request["footer_logo"]){
      $fileName = $request->file("footer_logo");
      $path = $fileName->getClientOriginalName();
      $imagePath = $fileName->storeAs("public/Brand",$path,"local");
      $imagePath = str_replace("public/Brand/","",$imagePath);
      $data["footer_logo"] = $imagePath;

      $response = Websetting::where('id',"1")->update(array(
        "footer_logo" => $imagePath,
        ));

    }
    if($request["favicon"]){
      $fileName = $request->file("favicon");
      $path = $fileName->getClientOriginalName();
      $imagePath = $fileName->storeAs("public/Brand",$path,"local");
      $imagePath = str_replace("public/Brand/","",$imagePath);
      $data["favicon"] = $imagePath;

      $response = Websetting::where('id',"1")->update(array(
        "favicon" => $imagePath,
        ));

    }
    if($request["favicon"] == "" && $request["head_logo"] == "" && $request["footer_logo"] == ""){
      $request->session()->flash('error','Please Select Any Logo & Try Again !');
      return back();
    }

      //send response
      if($response){
        $request->session()->flash('success','Logo Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }

  }

  public function NoticeUpdate(Request $request){
    $response = Websetting::where('id',"1")->update(array(
        "notification" => $request["notification"],
        ));
        //send response
        if($response){
          $request->session()->flash('success','Notice Updated Successfully !');
          return back();
        }else{
          $request->session()->flash('error','Something Is Wrong Please Try Again !');
          return back();
        }
  }

  //now social Media update Settings
  public function socialUpdate(Request $request){

    $response = Websetting::where('id',"1")->update(array(
      "facebook" => $request["facebook"],
      "youtube" => $request["youtube"],
      "twitter" => $request["twitter"],
      "whatsapp" => $request["whatsapp"],
      "linkedin" => $request["linkedin"],
      "pinterest" => $request["pinterest"],
      "instagram" => $request["instagram"],
      "github" => $request["github"],
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

  //now contact update Settings
  public function contactUpdate(Request $request){

    $response = Websetting::where('id',"1")->update(array(
      "pnum" => $request["pnum"],
      "secnum" => $request["secnum"],
      "pemail" => $request["pemail"],
      "secemail" => $request["secemail"],
      "address" => $request["address"],
      ));
      //send response
      if($response){
        $request->session()->flash('success','Contact Information Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }

  }

  //now admin about us update Settings
  public function AdminAboutUpdate(Request $request){

    $response = Websetting::where('id',"1")->update(array(
      "about_title" => $request["about_title"],
      "about_slug" => $request["about_slug"],
      "about_desc" => $request["about_desc"],
      ));
      //send response
      if($response){
        $request->session()->flash('success','About Us Information Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }

  }

  //now PaymentPolicyUpdate update Settings
  public function gameRule(Request $request){

    $response = Websetting::where('id',"1")->update(array(
      "classic_rule" => $request["classic_rule"],
      "quick_rule" => $request["quick_rule"],
      "arrow_rule" => $request["arrow_rule"],
      ));
      //send response
      if($response){
        $request->session()->flash('success','Game Rule Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }

  }

  //now ShippingPolicyUpdate update Settings
  public function GameConfig(Request $request){

    $response = Websetting::where('id',"1")->update(array(
      "commission" => $request["commission"],
      "signup_bonus" => $request["signup_bonus"],
      "refer_bonus" => $request["refer_bonus"],
      "min_withdraw" => $request["min_withdraw"],
      "support_mail" => $request["support_mail"],
      "whatsapp_link" => $request["whatsapp_link"],
      "youtube_link" => $request["youtube_link"],
      "bot_status" => $request["bot_status"],
      "purchase_link" => $request["purchase_link"],
      "server_key" => $request["server_key"],
      "payment_apikey" => $request["payment_apikey"],
      "payment_secret" => $request["payment_secret"],
      "paytm_midid" => $request["paytm_midid"],
      "paytm_secret" => $request["paytm_secret"],
      "app_version" => $request["app_version"],
      "telegram_link" => $request["telegram_link"],
      ));
      //send response
      if($response){
        $request->session()->flash('success','Game Configration Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }

  }



  //now TermsPolicyUpdate update Settings
  public function TermsPolicyUpdate(Request $request){

    $response = Websetting::where('id',"1")->update(array(
      "terms_title" => $request["terms_title"],
      "terms_slug" => $request["terms_slug"],
      "terms_desc" => $request["terms_desc"],
      ));
      //send response
      if($response){
        $request->session()->flash('success','Tearms & Conditions Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }

  }

  //now PrivacyPolicyUpdate update Settings
  public function PrivacyPolicyUpdate(Request $request){

    $response = Websetting::where('id',"1")->update(array(
      "privacy_title" => $request["privacy_title"],
      "privacy_slug" => $request["privacy_slug"],
      "privacy_desc" => $request["privacy_desc"],
      ));
      //send response
      if($response){
        $request->session()->flash('success','Privacy Policy Updated Successfully !');
        return back();
      }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
        return back();
      }

  }

    //now PrivacyPolicyUpdate update Settings
    public function RefundPolicyUpdate(Request $request){

        $response = Websetting::where('id',"1")->update(array(
          "refund_title" => $request["refund_title"],
          "refund_slug" => $request["refund_slug"],
          "refund_desc" => $request["refund_desc"],
          ));
          //send response
          if($response){
            $request->session()->flash('success','Refund Policy Updated Successfully !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Please Try Again !');
            return back();
          }

      }


}
