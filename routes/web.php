<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/login/custom',[
	'uses' => 'LoginController@login',
	'as' => 'login.custom'
]);



Route::group(['middleware' => 'auth'], function(){

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/editprofile','ProfileController@editprofile')->name('editprofile');
	Route::post('/editprofile','ProfileController@register')->name('editprofile');
	Route::get('/intrest','RequestController@intrest')->name('intrest');
	Route::get('/match','MatchController@index')->name('match'); 
	Route::get('/profile/{user}', 'ProfileController@profile')->name('profile.show');

	Route::get('/sendrequest','RequestController@sendrequest')->name('sendrequest');
	Route::get('/receiverequest','RequestController@receiverequest')->name('receiverequest');

	Route::get('/newuser', 'AdminController@newuser')->name('newuser');
	// Route::post('/newuser','AdminController@newuserupdate');
	Route::get('/alluser', 'AdminController@alluser')->name('alluser');
	Route::post('/alluser','AdminController@newuserupdate')->name('alluserajax');

	Route::get('/notification','NotificationController@notification')->name('notification');

	Route::get('dropdownlist/getstates/{id}','ProfileController@getStates');
	Route::get('dropdownlist/getcitys/{id}','ProfileController@getCity');

	// Route::post('/match','MatchController@filter1');	
	Route::post('/match','MatchController@filter')->name('filterform');

	Route::post('/request', 'RequestController@store')->name('request');
	
	Route::post('/addcountry', 'HomeController@storecountry')->name('addcountry');
	Route::post('/addstate', 'HomeController@storestate')->name('addstate');

	Route::view('editprofile2','editprofile2',[ 'profiles' => App\profile::all()]);

});

