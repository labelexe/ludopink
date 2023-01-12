<?php

namespace App\Http\Controllers\Jackpot;

use App\Http\Controllers\Controller;
use App\Models\Jackpot\Jackpot;
use Illuminate\Http\Request;

class JackpotController extends Controller
{
      public function index(){
     $brands = Jackpot::latest()->paginate(10);
     return view("admin.Jackpot.Jackpot",compact('brands'));
   }

   //create brands

    public function create(Request $request)
   {
       $response = Jackpot::create($request->all());
       if($response){
        $request->session()->flash('success','Jackpot Added Successfully !');
           return redirect('admin/jackpoint');
       }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
           return redirect('admin/jackpoint');
       }

   }


      //now edit product brand

      public function edit($id){

        $response = Jackpot::where('_id',$id)->get();
        if($response){
          return response(array("data"=>$response),200)->header("Content-Type","application/json");
         }
         else{
             return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
         }

      }

      //now update product brands

      public function update(Request $request, $id){

        $response = Jackpot::where("_id",$id)->update(array(
            "jackpot_entry" => $request["jackpot_entry"],
            "number_of_game" => $request["number_of_game"],
            ));

          //send response
          if($response){
            $request->session()->flash('success','Jackpot Updated Successfully !');
            return back();
          }else{
            $request->session()->flash('error','Something Is Wrong Pleease Try Again !');
            return back();
          }
      }

      public function delete($id){
        $response = Jackpot::find($id);
        $response = $response->delete();
        if($response){
          return response(array("notice"=>"Data Delete Success"),200)->header("Content-Type","application/json");
         }
         else{
             return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
         }

      }
}
