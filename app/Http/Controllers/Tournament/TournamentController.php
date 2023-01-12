<?php

namespace App\Http\Controllers\Tournament;

use App\Http\Controllers\Controller;
use App\Models\Tournament\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{

    public function index(){
        $data = Tournament::latest()->paginate(10);
        return view("admin.Tournament.Tournament",compact('data'));
    }

    public function AddTournament(){
        return view("admin.Tournament.AddTournament");
    }

    //now create tournament

    public function CreatteTournament(Request $request){
      $response = Tournament::create($request->all());
       if($response){
        $request->session()->flash('success','Tournament Successfully Created !');
           return redirect('admin/tournament');
       }else{
        $request->session()->flash('error','Something Is Wrong Please Try Again !');
           return redirect('admin/tournament');
       }
    }
}
