<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
    	
    	if(Auth::attempt([
    		'email' => $request->email,
    		'password' => $request->password
    	]))
    	{
    		$user = User::where('email',$request->email)->first();
            if($user->is_admin())
    		{
    			return redirect()->route('home');
    		}
            if($user->is_block())
            {
               dd("block");
               return redirect()->route(''); 
            }
            else{
                 if($user->is_new())
                {
                   dd("wait untill admin accept request");
                   return redirect()->route(''); 
                }   
                else{
                    if($user['firstname'] == null || $user['surname'] == null || $user['dob'] == null || $user['age'] == null || $user['gender'] == null )
                    {
                        return redirect()->route('editprofile');    
                    }
            		return redirect()->route('match');
                }
            }
    	}
    	return redirect()->back();
    }
}
