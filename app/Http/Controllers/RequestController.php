<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requestmodel;
use App\profile;
use Auth;

class RequestController extends Controller
{
   
   public function store(Request $request) { 
      
      $receiverid = $request->receiverid;
      $senderid = Auth::user()->id;

      
      return response()->json(['success'=>'Form is successfully submitted!']);

    }
   public function index($user)
    {
        
    	$request= new Requestmodel;
    	$authuser=Auth::user()->id;

    	$request->senderid=$authuser;
    	$request->receiverid=$user;
    	$request->responce=0;
    	$request->save();

    	$gender = profile::select('gender')->where('userid','=', $authuser)->get();
        $profiles = profile::all()->where('id','!=', $authuser)->where('gender','!=', $gender);
        return view('match',compact("profiles"));
    }

    public function sendrequest()
    {
    	$userid=Auth::user()->id;
        $users = profile::all()->where('id','==', $userid);
        foreach ($users as $user) {
        
            if($user['firstname'] == null || $user['surname'] == null || $user['dob'] == null || $user['age'] == null || $user['gender'] == null )
                {
                    
                    return redirect()->route('editprofile');    
                }
            else{
                	$request= Requestmodel::select('receiverid')->where('senderid','=',$userid)->where('responce','=','0')->get();
                	return view('sendrequest',compact("request"));
                }
        }
    }
    public function receiverequest()
    {
    	$userid=Auth::user()->id;
        $users = profile::all()->where('id','==', $userid);
        foreach ($users as $user) {
        
            if($user['firstname'] == null || $user['surname'] == null || $user['dob'] == null || $user['age'] == null || $user['gender'] == null )
                {
                    
                    return redirect()->route('editprofile');    
                }
            else{
                	$request= Requestmodel::select('senderid')->where('receiverid','=',$userid)->where('responce','=','0')->get();
                	return view('sendrequest',compact("request"));
                }
            }
    }
}
