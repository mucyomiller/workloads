<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::match(['get','post'],'/',['as'=>'login','uses'=>'StaffController@login']);
Route::match(['get','post'],'/login',['as'=>'login','uses'=>'StaffController@login']);
Route::match(['post','get'],'forget',['as'=>'forget','uses'=> 'StaffController@forget']);
Route::match(['post','get'],'register',['as'=>'register','uses'=>'StaffController@register']);
Route::post('setpassword',['as'=>'setpassword','uses'=>'StaffController@setpassword']);
//dashboard routes
Route::group(['prefix'=>'dashboard'],function(){
	//Route::get('/', ['uses'=>'StaffController@index', 'as'=>'dashboard.index']);
	Route::get('index',['as'=>'dashboard.index','uses'=>'StaffController@home']);
	Route::get('profile',['as'=>'dashboard.profile','uses'=>'StaffController@profile']);
  	//Route::get('delete', ['uses'=>'StaffController@delete', 'as'=>'delete']);
  	//Route::match(['get', 'post'],'courses', ['uses'=>'CourseController@index', 'as'=>'courses']);
  	Route::get('logout',['as'=>'dashboard.logout','uses'=> function(){
		Auth::logout();
		return redirect('/');
	}]);
});