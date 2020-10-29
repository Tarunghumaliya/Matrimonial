<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\profile;
use App\User;

class AdminController extends Controller
{
    public function newuser(){
    	$profile = profile::all()->where('status','==', 0)->where('admin','==',0);
        return view('adminuser',compact("profile"));
    }
    public function newuserupdate(Request $request){

    	$profile = User::find($request->userid);
    	
    	$profile->status=$request->status;
    	$profile->save();
    	return response()->json(['success'=>'Request is successfully accept!']);
    }

    public function alluser(){
    	$profile = profile::all()->where('admin','==',0);
        return view('adminuser',compact("profile"));
    }

    
}
