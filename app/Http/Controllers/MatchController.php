<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Auth;

class MatchController extends Controller
{
	public function index()
    {
    	$userid=Auth::user()->id;
    	$users = profile::all()->where('id','==', $userid);
    	foreach ($users as $user) {
    	
			if($user['firstname'] == null || $user['surname'] == null || $user['dob'] == null || $user['age'] == null || $user['gender'] == null )
		        {
		         	
		            return redirect()->route('editprofile');    
		        }
		    else{
		    	
		    	$gender = $user['gender'];
		        $profiles = profile::all()->where('gender','!=', $gender)->where('admin','==',0)->where('status','==',1);    
		        
				$religion = profile::select('religion')->groupBy('religion')->get()->toArray() ;
				$cast = profile::select('cast')->groupBy('cast')->get()->toArray() ;
				
		        return view('match',compact("profiles","religion","cast"));
		    
			}
    	}
    }

    public function filter(Request $request){
    	$profiles = profile::all()->where('age','>=',$request->minage)->where('age','<',$request->maxage)->where('admin','==',0)->where('status','==',1);
		

		$religion = profile::select('religion')->groupBy('religion')->get()->toArray() ;
		$cast = profile::select('cast')->groupBy('cast')->get()->toArray() ;
				
		return view('match',compact("profiles","religion","cast"));
    }
    
}
