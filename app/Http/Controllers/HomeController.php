<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profilecount = profile::all()->where('admin','!=', 1)->count();
        $activecount = profile::all()->where('admin','!=', 1)->where('status','=',1)->count();
        $newcount = profile::all()->where('admin','!=', 1)->where('status','=',0)->count();
        $countryresult = DB::table('countries')->select('id','name')->get();
        $country = json_decode($countryresult, true);
        $stateresult = DB::table('states')->select('id','name')->get();
        $state = json_decode($stateresult, true);
        
        return view('home' , compact('profilecount','activecount','newcount','country','state'));
    }
    public function storecountry(Request $request)
    {
        DB::table('countries')->insert( ['name' => $request->countryval] );
        return response()->json(['success'=>'Request is successfully accept!']);
    }

    public function storestate(Request $request)
    {
        DB::table('states')->insert( ['countries_id' => $request->countryval,'name' => $request->stateval] );
        return response()->json(['success'=>'Request is successfully accept!']);
    }
    
}
