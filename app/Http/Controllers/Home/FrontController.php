<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home\Homedetail;
use App\Models\Home\Screenshot;
use App\Models\Player\Userdata;
use Illuminate\Support\Facades\Artisan;
use App\Models\Contact\Contact;
use Illuminate\Support\Carbon;
use App\Models\AddCoin\Addcoin;
use App\Models\WebSetting\Websetting;

class FrontController extends Controller
{
    public function index()
    {
        return view("front.index");
    }

    public function imageUpdate()
    {
        $websetting = Websetting::where('id', "1")->first();
        $homedetails = Homedetail::where('id', "1")->first();
        return view("admin.Home.HomeImage", compact('websetting', 'homedetails'));
    }

    public function UpdateBannerImage(Request $request)
    {
        $fileName = $request->file("bannerimg");
        $path = $fileName->getClientOriginalName();
        $imagePath = $fileName->storeAs("public/Brand", $path, "local");
        $imagePath = str_replace("public/Brand/", "", $imagePath);
        $data["bannerimg"] = $imagePath;

        $response = Homedetail::where('id', "1")->update(array(
            "bannerimg" => $imagePath,
        ));

        if ($response) {
            $request->session()->flash('success', 'Banner Image Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }
    public function UpdateAboutImage(Request $request)
    {
        $fileName = $request->file("about_img");
        $path = $fileName->getClientOriginalName();
        $imagePath = $fileName->storeAs("public/Brand", $path, "local");
        $imagePath = str_replace("public/Brand/", "", $imagePath);
        $data["about_img"] = $imagePath;

        $response = Homedetail::where('id', "1")->update(array(
            "about_img" => $imagePath,
        ));

        if ($response) {
            $request->session()->flash('success', 'About Image Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function UpdateDownloadImage(Request $request)
    {
        $fileName = $request->file("download_image");
        $path = $fileName->getClientOriginalName();
        $imagePath = $fileName->storeAs("public/Brand", $path, "local");
        $imagePath = str_replace("public/Brand/", "", $imagePath);
        $data["download_image"] = $imagePath;

        $response = Homedetail::where('id', "1")->update(array(
            "download_image" => $imagePath,
        ));

        if ($response) {
            $request->session()->flash('success', 'Download Image Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function UpdateContactImage(Request $request)
    {
        $fileName = $request->file("contact_image");
        $path = $fileName->getClientOriginalName();
        $imagePath = $fileName->storeAs("public/Brand", $path, "local");
        $imagePath = str_replace("public/Brand/", "", $imagePath);
        $data["contact_image"] = $imagePath;

        $response = Homedetail::where('id', "1")->update(array(
            "contact_image" => $imagePath,
        ));

        if ($response) {
            $request->session()->flash('success', 'Contact Image Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }


    //now logo update Settings
    public function UpdateFeaturesImage(Request $request)
    {

        if ($request["easy_icon"]) {
            $fileName = $request->file("easy_icon");
            $path = $fileName->getClientOriginalName();
            $imagePath = $fileName->storeAs("public/Brand", $path, "local");
            $imagePath = str_replace("public/Brand/", "", $imagePath);
            $data["easy_icon"] = $imagePath;

            $response = Homedetail::where('id', "1")->update(array(
                "easy_icon" => $imagePath,
            ));
        }
        if ($request["de_icon"]) {
            $fileName = $request->file("de_icon");
            $path = $fileName->getClientOriginalName();
            $imagePath = $fileName->storeAs("public/Brand", $path, "local");
            $imagePath = str_replace("public/Brand/", "", $imagePath);
            $data["de_icon"] = $imagePath;

            $response = Homedetail::where('id', "1")->update(array(
                "de_icon" => $imagePath,
            ));
        }
        if ($request["op_icon"]) {
            $fileName = $request->file("op_icon");
            $path = $fileName->getClientOriginalName();
            $imagePath = $fileName->storeAs("public/Brand", $path, "local");
            $imagePath = str_replace("public/Brand/", "", $imagePath);
            $data["op_icon"] = $imagePath;

            $response = Homedetail::where('id', "1")->update(array(
                "op_icon" => $imagePath,
            ));
        }
        if ($request["op_icon"] == "" && $request["de_icon"] == "" && $request["easy_icon"] == "") {
            $request->session()->flash('error', 'Please Select Any Images & Try Again !');
            return back();
        }
        //send response
        if ($response) {
            $request->session()->flash('success', 'Features Images Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    //now text update coding

    public function TextUpdate()
    {
        $homedetails = Homedetail::where('id', "1")->first();
        return view("admin.Home.HomeTextUpdate", compact('homedetails'));
    }

    public function HeadingTextUpdate(Request $request)
    {
        $response = Homedetail::where("id", "1")->update(array(
            "heading" => $request->heading,
            "subheading" => $request->subheading,
        ));
        if ($response) {
            $request->session()->flash('success', 'Deatils Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function AboutTextUpdate(Request $request)
    {
        $response = Homedetail::where("id", "1")->update(array(
            "about_title" => $request->about_title,
            "about_desc" => $request->about_desc,
            "about_setp1" => $request->about_setp1,
            "about_step2" => $request->about_step2,
            "about_step3" => $request->about_step3,
        ));
        if ($response) {
            $request->session()->flash('success', 'Deatils Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function UpdateWhyChoose(Request $request)
    {
        $response = Homedetail::where("id", "1")->update(array(
            "cardtitle1" => $request->cardtitle1,
            "carddescr1" => $request->carddescr1,
            "cardicon1" => $request->cardicon1,
            "cardtitle2" => $request->cardtitle2,
            "carddescr2" => $request->carddescr2,
            "cardicon2" => $request->cardicon2,
            "cardtitle3" => $request->cardtitle3,
            "carddescr3" => $request->carddescr3,
            "cardicon3" => $request->cardicon3,
            "cardtitle4" => $request->cardtitle4,
            "carddescr4" => $request->carddescr4,
            "cardicon4" => $request->cardicon4,
        ));
        if ($response) {
            $request->session()->flash('success', 'Deatils Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function UpdateFunFact(Request $request)
    {
        $response = Homedetail::where("id", "1")->update(array(
            "totalinstall" => $request->totalinstall,
            "totaldownload" => $request->totaldownload,
            "activeuser" => $request->activeuser,
            "satisfieduser" => $request->satisfieduser,
        ));
        if ($response) {
            $request->session()->flash('success', 'Deatils Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function FeaturesTextUpdate(Request $request)
    {
        $response = Homedetail::where("id", "1")->update(array(
            "fe_title" => $request->fe_title,
            "fe_desc" => $request->fe_desc,
            "fetitle1" => $request->fetitle1,
            "fedesc1" => $request->fedesc1,
            "feicon1" => $request->feicon1,
            "fetitle2" => $request->fetitle2,
            "fedesc2" => $request->fedesc2,
            "feicon2" => $request->feicon2,
            "fetitle3" => $request->fetitle3,
            "fedesc3" => $request->fedesc3,
            "feicon3" => $request->feicon3,
            "fetitle4" => $request->fetitle4,
            "fedesc4" => $request->fedesc4,
            "feicon4" => $request->feicon4,
            "fetitle5" => $request->fetitle5,
            "fedesc5" => $request->fedesc5,
            "feicon5" => $request->feicon5,
            "fetitle6" => $request->fetitle6,
            "fedesc6" => $request->fedesc6,
            "feicon6" => $request->feicon6,
        ));
        if ($response) {
            $request->session()->flash('success', 'Deatils Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function DownloadTextUpdate(Request $request)
    {
        $response = Homedetail::where("id", "1")->update(array(
            "download_title" => $request->download_title,
            "download_desc" => $request->download_desc,
        ));
        if ($response) {
            $request->session()->flash('success', 'Deatils Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function TestimonialText(Request $request)
    {
        $response = Homedetail::where("id", "1")->update(array(
            "testimonial_title" => $request->testimonial_title,
            "testimonial_desc" => $request->testimonial_desc,
        ));
        if ($response) {
            $request->session()->flash('success', 'Deatils Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function ContactDeTect(Request $request)
    {
        $response = Homedetail::where("id", "1")->update(array(
            "contact_title" => $request->contact_title,
            "contact_desc" => $request->contact_desc,
        ));
        if ($response) {
            $request->session()->flash('success', 'Deatils Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function ScreenshotTextUpdate(Request $request)
    {
        $response = Homedetail::where("id", "1")->update(array(
            "screenshot_title" => $request->screenshot_title,
            "screenshot_desc" => $request->screenshot_desc,
        ));
        if ($response) {
            $request->session()->flash('success', 'Deatils Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function ContactTextUpdate(Request $request)
    {
        $response = Homedetail::where("id", "1")->update(array(
            "contact_video" => $request->contact_video,
        ));
        if ($response) {
            $request->session()->flash('success', 'Deatils Updated Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }


    public function UploadAPK(Request $request)
    {
        $fileName = $request->file("download_link");
        $path = $fileName->getClientOriginalName();
        $imagePath = $fileName->storeAs("public/Brand", $path, "local");
        $imagePath = str_replace("public/Brand/", "", $imagePath);
        $data["download_link"] = $imagePath;

        $response = Homedetail::where('id', "1")->update(array(
            "download_link" => $imagePath,
        ));

        if ($response) {
            $request->session()->flash('success', 'APK Uploded Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }


    public function Screenshot()
    {
        $brands = Screenshot::latest()->paginate(10);
        return view("admin.Home.Screenshot", compact('brands'));
    }

    public function UploadScreenshot(Request $request)
    {

        $data = $request->all();
        $fileName = $request->file("screenshot");
        $path = $fileName->getClientOriginalName();
        $imagePath = $fileName->storeAs("public/Screenshot", $path, "local");
        $imagePath = str_replace("public/Screenshot/", "", $imagePath);
        $data["screenshot"] = $imagePath;
        $response = Screenshot::create($data);
        if ($response) {
            $request->session()->flash('success', 'Screenshot Uploded Successfully !');
            return back();
        } else {
            $request->session()->flash('error', 'Something Is Wrong Please Try Again !');
            return back();
        }
    }

    public function delete($id)
    {
        $response = Screenshot::find($id);
        $response = $response->delete();
        if ($response) {
            return response(array("notice" => "Data Delete Success"), 200)->header("Content-Type", "application/json");
        } else {
            return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
        }
    }

    public function ContactNow(Request $request)
    {
        $response = Contact::create($request->all());
        if ($response) {
            return response(array("notice" => "success"), 200)->header("Content-Type", "application/json");
        } else {
            return response(array("notice" => "failed"), 404)->header("Content-Type", "application/json");
        }
    }

    public function contactlist(Request $request)
    {
        $contact = Contact::latest()->paginate(10);
        return view("admin.Contact.Contact", compact('contact'));
    }

    public function AddCoinRequest(Request $request)
    {
        $data = $request->all();
        $fileName = $request->file("image");
        $path = $fileName->getClientOriginalName();
        $imagePath = $fileName->storeAs("public/Payment", $path, "local");
        $imagePath = str_replace("public/Payment/", "", $imagePath);
        $data["image"] = $imagePath;
        $userdata = Userdata::where("useremail", $request->email)->first();
        if ($userdata != "") {
            $insert = Addcoin::insert([
                'playerid' => $userdata['playerid'],
                "image" => $imagePath,
                "name" => $request->name,
                "email" => $request->email,
                "coin" => $request->coin,
                "status" => "0",
                "trans_date" => date("l jS F Y h:i:s A"),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
            if ($insert) {
                return redirect('payment/success');
            } else {
                return redirect('payment/failed');
            }
        } else {
            return redirect('payment/failed');
        }
    }

    public function ClearCache(Request $request)
    {
        $cache = Artisan::call('optimize:clear');
        if ($cache) {
            return back();
        } else {
            return back();
        }
    }



    public function DeleteContact($id)
    {
        $response = Contact::find($id);
        $response = $response->delete();
        if ($response) {
            return response(array("notice" => "Data Delete Success"), 200)->header("Content-Type", "application/json");
        } else {
            return response(array("notice" => "Data Not Delete"), 404)->header("Content-Type", "application/json");
        }
    }
}
