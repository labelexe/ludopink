<?php

namespace App\Http\Controllers\Testimonial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Testimonial\Testimonial;

class TestimonialController extends Controller
{
    //index function
    public function index()
    {
        $data = Testimonial::latest()->paginate(10);
        return view("admin.Testimonial.AllTestimonial", compact('data'));
    }

    public function AddTestimonialForm()
    {
        return view("admin.Testimonial.AddTestimonial");
    }

    public function CreateTestimonial(Request $request)
    {

        $data = $request->all();
        $fileName = $request->file("profile_image");
        $path = $fileName->getClientOriginalName();
        $imagePath = $fileName->storeAs("public/Testimonial", $path, "local");
        $imagePath = str_replace("public/Testimonial/", "", $imagePath);
        $data["profile_image"] = $imagePath;
        $response = Testimonial::create($data);
        if ($response) {
            $request->session()->flash('success', 'Testimonial Created Successfully !');
            return redirect('admin/testimonial/all');
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return redirect('admin/testimonial/all');
        }
    }

    public function DeleteTestimonial($id)
    {
        $data = Testimonial::where('id', $id)->first();
        $file = "public/Testimonial/" . $data->profile_image;
        Storage::delete($file);
        $response = Testimonial::find($id);
        $response = $response->delete();
        if ($response) {
            return response(array("notice" => "Data Delete Success"), 200)->header("Content-Type", "application/json");
        } else {
            return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
        }
    }
}
