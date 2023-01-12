<?php

namespace App\Http\Controllers\Faq;

use App\Http\Controllers\Controller;
use App\Models\Faq\Faq;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $faq = Faq::latest()->paginate(10);
        return view('admin.FAQ.FaqList',compact('faq'));
    }
    public function addFaqForm(){
        return view('admin.FAQ.AddFaq');
    }

    //now create FAQ

    public function FAQCreate(Request $request){
        $response = Faq::create($request->all());
        if($response){
        	$request->session()->flash('success','FAQ Created Successfully !');
            return redirect('admin/faq/all');
        }else{
        	$request->session()->flash('error','Something IS Wrong Please Try Again !');
            return redirect('admin/faq/add');
        }
    }

    //edit FAQ Form
    public function EditFaqForm($id){
        $data = Faq::where('id',Crypt::decrypt($id))->first();
        return view('admin.FAQ.EditFaq',compact('data'));
    }

    //now update FAQ

    public function UpdateFaq(Request $request,$id){
        $response = Faq::where("id",Crypt::decrypt($id))->update(array(
            "faq_title" => $request["faq_title"],
            "faq_desc" => $request["faq_desc"],
            ));
            if($response){
                $request->session()->flash('success','FAQ Updated Successfully !');
                return redirect('admin/faq/all');
            }else{
                $request->session()->flash('error','Something IS Wrong Please Try Again !');
                return redirect('admin/faq/all');
            }
    }
    //now delete faq

    public function DeleteFaq($id){
    $response = Faq::find($id);
      $response = $response->delete();
      if($response){
        return response(array("notice"=>"Data Delete Success"),200)->header("Content-Type","application/json");
       }
       else{
           return response(array("notice"=>"Data Not Delete"),404)->header("Content-Type","application/json");
       }

      }
}
