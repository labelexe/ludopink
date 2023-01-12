<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            //get next condition here
            return redirect('admin/dashboard');
        }
        else{
           return view('admin.login.AdminLogin');
        }
        return view('admin.login.AdminLogin');
    }

    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        $result = Admin::where(['email'=>$email])->first();
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$email);
                $request->session()->put('ADMIN_PASS',$password);
                return redirect('admin/dashboard');


            }else{
                $request->session()->flash('error','Please Enter Valid Password !');
                 return redirect('admin');
            }
            }else{
                $request->session()->flash('error','Please Enter Valid Email !');
                return redirect('admin');
            }
    }

}
