<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;
use Auth;
use App\profile;

class NotificationController extends Controller
{
    public function notification(){

    	$user=Auth::user()->id;
    	$loginprofile = profile::all()->where('id','=', $user);
    	$notification = Notification::all()->where('receiverid','=', $user);
    	return view('notification',compact("notification","loginprofile"));
    }
}
