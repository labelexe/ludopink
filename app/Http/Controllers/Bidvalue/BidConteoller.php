<?php

namespace App\Http\Controllers\Bidvalue;

use App\Http\Controllers\Controller;
use App\Models\Bidvalue\Bid;
use Illuminate\Http\Request;

class BidConteoller extends Controller
{
    public function index()
    {
        $brands = Bid::latest()->paginate(10);
        return view("admin.Bidvalue.Bidvalue", compact('brands'));
    }

    //create brands

    public function create(Request $request)
    {
        $getbidlength = Bid::count();

        if ($getbidlength >= 10) {
            $request->session()->flash('error', 'You Can Create Max 10 Bids');
            return redirect('admin/bid/coin');
        } else {
            $response = Bid::create($request->all());
            if ($response) {
                $request->session()->flash('success', 'Bid Value Added Successfully !');
                return redirect('admin/bid/coin');
            } else {
                $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
                return redirect('admin/bid/coin');
            }
        }
    }


    //now edit product brand

    public function edit($id)
    {

        $response = Bid::where('id', $id)->get();
        if ($response) {
            return response(array("data" => $response), 200)->header("Content-Type", "application/json");
        } else {
            return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
        }
    }

    //now update product brands

    public function update(Request $request, $id)
    {

        $response = Bid::where("id", $id)->update(array(
            "bid_value" => $request["bid_value"],
        ));

        //send response
        if ($response) {
            $request->session()->flash('success', 'Bid Value Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Pleease Try Again !');
            return back();
        }
    }

    public function delete($id)
    {
        $response = Bid::find($id);
        $response = $response->delete();
        if ($response) {
            return response(array("notice" => "Data Delete Success"), 200)->header("Content-Type", "application/json");
        } else {
            return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
        }
    }
}
