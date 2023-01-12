<?php

namespace App\Http\Controllers\Shopcoin;

use App\Http\Controllers\Controller;
use App\Models\Shopcoin\Shopcoin;
use Illuminate\Http\Request;

class ShopcoinController extends Controller
{
      public function index(){
     $brands = Shopcoin::latest()->paginate(10);
     return view("admin.Shopcoin.Shopcoin",compact('brands'));
   }

   //create brands

    public function create(Request $request)
   {
       $response = Shopcoin::create($request->all());
       if($response){
        $request->session()->flash('success','Shop Coin Added Successfully !');
           return redirect('admin/shop/coin');
       }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
           return redirect('admin/shop/coin');
       }

   }


      //now edit product brand

      public function edit($id){

        $response = Shopcoin::where('id',$id)->get();
        if($response){
          return response(array("data"=>$response),200)->header("Content-Type","application/json");
         }
         else{
             return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
         }

      }

      //now update product brands

      public function update(Request $request, $id){

        $response = Shopcoin::where("id",$id)->update(array(
            "shop_coin" => $request["shop_coin"],
            ));

          //send response
          if($response){
            $request->session()->flash('success','Shop Coin Updated Successfully !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }
      }

      public function delete($id){
        $response = Shopcoin::find($id);
        $response = $response->delete();
        if($response){
          return response(array("notice"=>"Data Delete Success"),200)->header("Content-Type","application/json");
         }
         else{
             return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
         }

      }
}
