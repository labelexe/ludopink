<?php

namespace App\Http\Controllers\SpecialOffer;

use App\Http\Controllers\Controller;
use App\Models\Special\Special;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SpecialofferController extends Controller
{
     public function index(){
     $brands = Special::latest()->paginate(10);
     return view("admin.SpecialOffer.SpecialOffer",compact('brands'));
   }

   //create brands

    public function create(Request $request)
   {
      $data = $request->all();
      $fileName = $request->file("offerimage");
      $path = $fileName->getClientOriginalName();
      $imagePath = $fileName->storeAs("public/OfferImg",$path,"local");
      $imagePath = str_replace("public/OfferImg/","",$imagePath);
      $data["offerimage"] = $imagePath;

       $response = Special::create($data);
       if($response){
        $request->session()->flash('success','Special Offer Created Successfully !');
           return redirect('admin/special/offer');
       }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
           return redirect('admin/special/offer');
       }

   }


      //now edit product brand

      public function edit($id){

        $response = Special::where('_id',$id)->get();
        if($response){
          return response(array("data"=>$response),200)->header("Content-Type","application/json");
         }
         else{
             return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
         }

      }

      //now update product brands

      public function update(Request $request, $id){

        if($request["offerimage"]){
          $fileName = $request->file("offerimage");
          $path = $fileName->getClientOriginalName();
          $imagePath = $fileName->storeAs("public/OfferImg",$path,"local");
          $imagePath = str_replace("public/OfferImg/","",$imagePath);
          $data["offerimage"] = $imagePath;

          $response = Special::where("_id",$id)->update(array(
            "offer_title" => $request["offer_title"],
            "add_offer_coin" => $request["add_offer_coin"],
            "offerimage" => $imagePath,
            "user_received_coin" => $request["user_received_coin"],
            ));

        }else{
          $response = Special::where("_id",$id)->update(array(
            "offer_title" => $request["offer_title"],
            "add_offer_coin" => $request["add_offer_coin"],
            "user_received_coin" => $request["user_received_coin"],
            ));
        }

          //send response
          if($response){
            $request->session()->flash('success','Special Offer Updated Successfully !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }
      }

      public function delete($id){
        $data = Special::where('id',$id)->first();
        $file = "public/OfferImg/".$data->offerimage;
        Storage::delete($file);
        $response = Special::find($id);
        $response = $response->delete();
        if($response){
          return response(array("notice"=>"Data Delete Success"),200)->header("Content-Type","application/json");
         }
         else{
             return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
         }

      }
}
