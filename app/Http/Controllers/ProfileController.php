<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\User;
use App\Notification;
use Auth;
use DB;

class ProfileController extends Controller
{
	
    public function profile($user)
    {
        $loginid=Auth::user()->id;
        $loginprofile = profile::all()->where('id','=', $loginid);

        $profile = profile::all()->where('id','=', $user);
    
        return view('profile',compact("profile","loginprofile"));
    }
    public function editprofile()
    {
        $user=Auth::user()->id;
        $loginprofile = profile::all()->where('id','=', $user);

        $countries = DB::table('countries')->pluck("name","id");


        $profile = profile::all()->where('id','=', $user);
        return view('editprofile',compact("profile","countries","loginprofile"));
    }
    public function getStates($id) 
    {
        $states = DB::table("states")->where("countries_id",$id)->pluck("name","id");
        return json_encode($states);
    }
    public function getCity($id) 
    {
        $city = DB::table("citys")->where("states_id",$id)->pluck("name","id");
        return json_encode($city);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
        'firstname' => 'required',
        'surname' => 'required',
        'dob' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'religion' => 'required',
        'cast' => 'required',
    ]);


        $userid=Auth::user()->id;
        $profile = User::find($userid);


        if($request->hasFile('image')){
            $original_name = strtolower(trim($request->image->getClientOriginalName()));
            $file_name = $userid.$original_name;
            $request->image->move('uploads',$file_name);
            $profile->photoname=$file_name;
        }  

        
        $profile->firstname=$request["firstname"];
        $profile->surname=$request["surname"];
        $profile->dob=$request["dob"];
        $profile->age=$request["age"];
        $profile->gender=$request["gender"];
        $profile->religion=$request["religion"];
        $profile->cast=$request["cast"];
        $profile->mobile=$request["mobile"];
        $profile->country=$request["country"];
        $profile->state=$request["state"];
        $profile->city=$request["city"];
        $profile->height=$request["height"];
        $profile->weight=$request["weight"];
        $profile->education=$request["education"];
        $profile->profession=$request["profession"];
        $profile->salary=$request["salary"];
        $profile->marid=$request["marid"];
        $profile->mothertoung=$request["mothertoung"];
        $profile->fathername=$request["fathername"];
        $profile->foccupation=$request["foccupation"];
        $profile->mothername=$request["mothername"];
        $profile->moccupation=$request["moccupation"];
        $profile->brother=$request["brother"];
        $profile->sister=$request["sister"];


        $profile->save();

        // if($profile->ststus == 0)
        // {
        //     dd('wait for accept request');
        //     return redirect('logout');
        // }

        return redirect('/match');
    }
    
}
