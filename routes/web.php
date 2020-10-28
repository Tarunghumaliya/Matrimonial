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
	Route::get('/intrest','IntrestController@index')->name('intrest');
	Route::get('/match','MatchController@index')->name('match'); 
	Route::get('/profile/{user}', 'ProfileController@profile')->name('profile.show');

//Route::get('/request/{user}','RequestController@index');
	Route::get('/sendrequest','RequestController@sendrequest')->name('sendrequest');
	Route::get('/receiverequest','RequestController@receiverequest')->name('receiverequest');

	Route::get('/newuser', 'AdminController@newuser')->name('newuser');
	Route::post('/newuser','AdminController@newuserupdate');
	Route::get('/alluser', 'AdminController@alluser')->name('alluser');
	Route::post('/alluser','AdminController@newuserupdate');

	Route::get('/notification','NotificationController@notification')->name('notification');

	Route::get('dropdownlist/getstates/{id}','ProfileController@getStates');
	Route::get('dropdownlist/getcitys/{id}','ProfileController@getCity');

	Route::post('/match','MatchController@filter');	


	Route::post('/request', 'RequestController@store')->name('request');

	Route::view('editprofile2','editprofile2',[ 'profiles' => App\profile::all()]);

});




// https://www.youtube.com/watch?v=mqgozi5H6xM