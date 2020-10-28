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

        $req = Requestmodel::all()->where('senderid','==', $senderid)->where('receiverid','==', $receiverid)->count();
        if ($req > 0) {
            return response()->json(['success'=>'Request is already submitted!']);
        }
        else{
            $request= new Requestmodel;
            $request->senderid=$senderid;
            $request->receiverid=$receiverid;
            $request->responce=0;
            $request->save();
        }
      return response()->json(['success'=>'Request is successfully submitted!']);

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

                    $loginprofile = profile::all()->where('id','=', $userid);
                	return view('sendrequest',compact("request","loginprofile"));
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

                    $loginprofile = profile::all()->where('id','=', $userid);
                	return view('sendrequest',compact("request","loginprofile"));
                }
            }
    }

    public function intrest(){

        $userid=Auth::user()->id;

        $loginprofile = profile::all()->where('id','=', $userid);

        $request= Requestmodel::all()->where('senderid','=',$userid)->where('receiverid','=',$userid)->where('responce','=','1')->get();
        return view('sendrequest',compact("request","loginprofile"));
    }
}
